<?php

namespace App\Console\Commands;

use App\Models\PostgraduateQuota;
use App\Models\University;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use SplFileObject;

class ImportPostgraduateQuotas extends Command
{
    protected $signature = 'import:postgraduate-quotas';
    protected $description = 'استيراد بيانات الدراسات العليا من Google Sheets';

    // رابط Google Sheets للدراسات العليا
    protected $googleSheetsUrl = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vRnLFG4KHw627ExCvL7sRAFqSjwty7F3KcN7m8WN4zQvtqEq49zVQpCYK4dErqjhX5yOG1kQ62pohqH/pub?output=csv';

   public function handle()
{
    $this->info('بدء استيراد بيانات الدراسات العليا...');

    try {
        $response = Http::timeout(60)->get($this->googleSheetsUrl);
        
        if (!$response->successful()) {
            $this->error('فشل في جلب البيانات: ' . $response->status());
            return 1;
        }
        
        $file = new SplFileObject('php://temp', 'r+');
        $file->fwrite($response->body());
        $file->rewind();

        // قراءة الرؤوس
        $headers = $this->readHeaders($file);
        if (empty($headers)) {
            $this->error('لم يتم العثور على رؤوس الأعمدة');
            return 1;
        }

        $this->info('الأعمدة المكتشفة: ' . implode(', ', $headers));

        $columnMap = $this->getColumnMap();
        $headerIndexes = $this->mapHeaders($headers, $columnMap);
        
        // ✅ لا نستخدم truncate() حتى لا نفقد البيانات
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // PostgraduateQuota::truncate();
        
        $count = $this->importData($file, $headerIndexes, $columnMap);
        
        // DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        $this->info("✅ تم استيراد وتحديث {$count} سجل بنجاح!");
        
    } catch (\Exception $e) {
        $this->error('خطأ: ' . $e->getMessage());
        return 1;
    }
    
    return 0;
}

    private function readHeaders($file)
    {
        while (!$file->eof()) {
            $line = $file->fgetcsv();
            if ($line === false) continue;
            
            $cleaned = array_map(function($h) {
                return trim(preg_replace('/[\x00-\x1F\x7F]/', '', (string)$h));
            }, $line);
            
            if (count(array_filter($cleaned)) > 0) {
                return $cleaned;
            }
        }
        return [];
    }

    private function getColumnMap()
    {
        return [
            '*' => 'competition_number',
            'اسم الجامعة' => 'university_name_tr',
            'المعهد' => 'institute',
            'اسم الجامعة بالعربي' => 'university_name_ar',
            'الأجرة' => 'fee',
            'المدينة' => 'city',
            'بدء التسجيل' => 'registration_start',
            'انتهاء التسجيل' => 'registration_end',
            'النتائج' => 'results_date',
            'الشهادات المقبولة' => 'accepted_certificates',
            'التفاصيل' => 'details',
            'نوع التقديم' => 'application_method',
            'الترتيب المحلي' => 'local_rank',
        ];
    }

    private function mapHeaders($headers, $columnMap)
    {
        $indexes = [];
        foreach ($headers as $index => $header) {
            $indexes[$header] = $index;
        }
        return $indexes;
    }

    private function importData($file, $headerIndexes, $columnMap)
{
    $count = 0;
    $autoNumber = 1;
    
    while (!$file->eof()) {
        $rowData = $file->fgetcsv();
        if ($rowData === false || count(array_filter($rowData)) === 0) {
            continue;
        }

        $data = [];
        foreach ($columnMap as $csvHeader => $dbColumn) {
            $value = $headerIndexes[$csvHeader] ?? null;
            $rawValue = ($value !== null && isset($rowData[$value])) ? trim((string)$rowData[$value]) : null;
            
            if ($dbColumn === 'accepted_certificates' && $rawValue) {
                $certs = array_map('trim', explode(',', $rawValue));
                $rawValue = json_encode($certs, JSON_UNESCAPED_UNICODE);
            }
            
            if (in_array($dbColumn, ['registration_start', 'registration_end', 'results_date']) && $rawValue) {
                try {
                    $date = \DateTime::createFromFormat('d/m/Y', $rawValue);
                    if ($date) {
                        $rawValue = $date->format('Y-m-d');
                    } else {
                        $rawValue = Carbon::parse($rawValue)->format('Y-m-d');
                    }
                } catch (\Exception $e) {
                    $this->warn("فشل تحويل التاريخ '{$rawValue}'");
                    $rawValue = null;
                }
            }
            
            $data[$dbColumn] = $rawValue ?: null;
        }
        
        // إذا كان competition_number فارغاً، استخدم رقم تلقائي
        if (empty($data['competition_number'])) {
            $data['competition_number'] = $autoNumber++;
        }
        
        // ربط بالجامعة
        $university = University::where('name_ar', $data['university_name_ar'] ?? '')
            ->orWhere('name_tr', $data['university_name_tr'] ?? '')
            ->first();
        
        if ($university) {
            $data['university_id'] = $university->id;
        }
        
        if (!empty($data['university_name_ar'])) {
            // ✅ استخدام updateOrCreate بدلاً من create
            PostgraduateQuota::updateOrCreate(
                [
                    'competition_number' => $data['competition_number'],
                    'university_name_tr' => $data['university_name_tr'],
                ],
                array_filter($data, function($value, $key) {
                    // لا نقوم بتحديث details إذا كانت فارغة
                    if ($key == 'details' && empty($value)) {
                        return false;
                    }
                    // لا نقوم بتحديث created_at و updated_at
                    if (in_array($key, ['created_at', 'updated_at'])) {
                        return false;
                    }
                    return $value !== null;
                }, ARRAY_FILTER_USE_BOTH)
            );
            $count++;
        }
    }
    
    return $count;
}
}