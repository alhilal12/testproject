<?php

namespace App\Console\Commands;

use App\Models\UniversityQuota;
use App\Models\University;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use SplFileObject;

class ImportUniversityQuotas extends Command
{
    protected $signature = 'import:university-quotas';
    protected $description = 'استيراد بيانات الجامعات من Google Sheets';

    public function handle()
    {
        $this->info('بدء استيراد بيانات الجامعات...');

        // ⚠️ ضع هنا رابط CSV من Google Sheets (من Publish to web)
        $googleSheetsUrl = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vQxsJmG8s5RB2Y9fQCKQKsJBhOjD_RXybxL8V6fxTshTcpTiXeSsRC0UZOhfYof2zon0y4DZghNFpDP/pub?output=csv';
        
        try {
            $response = Http::timeout(60)->get($googleSheetsUrl);
            
            if (!$response->successful()) {
                $this->error('فشل في جلب البيانات من Google Sheets: ' . $response->status());
                return 1;
            }
            
            $file = new SplFileObject('php://temp', 'r+');
            $file->fwrite($response->body());
            $file->rewind();

            // ✅ البحث عن سطر الرؤوس
            $headers = [];
            $headerFound = false;
            while (!$file->eof() && !$headerFound) {
                $line = $file->fgetcsv();
                
                if ($line === false) continue;
                
                $cleanedLine = array_map(function($h) {
                    $string = (string)$h;
                    $string = preg_replace('/^\xEF\xBB\xBF/', '', $string);
                    $string = preg_replace('/[\x00-\x1F\x7F]/', '', $string);
                    return trim($string);
                }, $line);

                if (count(array_filter($cleanedLine)) > 0) {
                    $headers = $cleanedLine;
                    $headerFound = true;
                }
            }

            if (empty($headers)) {
                $this->error('لم يتم العثور على رؤوس أعمدة صالحة');
                return 1;
            }

            $this->info('تم التعرف على الأعمدة: ' . implode(', ', $headers));
            
            // ✅ خريطة الأعمدة
            $columnMap = [
                '#' => 'competition_number',
                'اسم الجامعة' => 'university_name_tr',
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

            $headerIndexes = [];
            foreach ($headers as $index => $header) {
                $headerIndexes[$header] = $index;
            }

            // ✅ لا نستخدم truncate() حتى لا نفقد البيانات
            // DB::statement('SET FOREIGN_KEY_CHECKS=0');
            // UniversityQuota::truncate();
            // DB::statement('SET FOREIGN_KEY_CHECKS=1');
            
            $count = 0;
            $autoNumber = 1;
            
            while (!$file->eof()) {
                $rowData = $file->fgetcsv();
                
                if ($rowData === false || count(array_filter($rowData)) === 0) {
                    continue;
                }

                $dataToCreate = [];
                
                foreach ($columnMap as $csvHeader => $dbColumn) {
                    $value = null;
                    
                    if (isset($headerIndexes[$csvHeader]) && isset($rowData[$headerIndexes[$csvHeader]])) {
                        $value = trim((string)$rowData[$headerIndexes[$csvHeader]]);
                    }

                    // معالجة التواريخ
                    if (in_array($dbColumn, ['registration_start', 'registration_end', 'results_date']) && !empty($value)) {
                        try {
                            // محاولة تحويل التاريخ من صيغة d/m/Y إلى Y-m-d
                            $date = \DateTime::createFromFormat('d/m/Y', $value);
                            if ($date) {
                                $value = $date->format('Y-m-d');
                            } else {
                                // إذا فشل، جرب الصيغة الافتراضية
                                $value = Carbon::parse($value)->format('Y-m-d');
                            }
                        } catch (\Exception $e) {
                            $this->warn("فشل تحويل التاريخ '{$value}'");
                            $value = null;
                        }
                    }

                    // معالجة الشهادات المقبولة
                    if ($dbColumn === 'accepted_certificates' && !empty($value)) {
                        if (is_array($value)) {
                            $value = implode(', ', $value);
                        }
                        $value = preg_replace('/[\x00-\x1F\x7F]/', '', $value);
                        $certificatesArray = array_map('trim', explode(',', $value));
                        $value = json_encode($certificatesArray, JSON_UNESCAPED_UNICODE);
                    } elseif ($dbColumn === 'accepted_certificates') {
                        $value = '[]';
                    }

                    $dataToCreate[$dbColumn] = ($value !== '' && $value !== null) ? $value : null;
                }
                
                // ✅ إذا كان competition_number فارغاً، استخدم رقم تلقائي
                if (empty($dataToCreate['competition_number'])) {
                    $dataToCreate['competition_number'] = $autoNumber++;
                }
                
                // ✅ البحث عن الجامعة المطابقة
                $university = University::where('name_ar', $dataToCreate['university_name_ar'] ?? '')
                    ->orWhere('name_tr', $dataToCreate['university_name_tr'] ?? '')
                    ->first();
                
                if ($university) {
                    $dataToCreate['university_id'] = $university->id;
                }

                // التأكد من وجود البيانات الأساسية
                if (!empty($dataToCreate['university_name_ar']) && !empty($dataToCreate['university_name_tr'])) {
                    // ✅ استخدام updateOrCreate بدلاً من create
                    UniversityQuota::updateOrCreate(
                        [
                            'competition_number' => $dataToCreate['competition_number'],
                            'university_name_tr' => $dataToCreate['university_name_tr'],
                        ],
                        array_filter($dataToCreate, function($value, $key) {
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
            
            $this->info("✅ تم استيراد وتحديث {$count} سجل بنجاح!");
            
        } catch (\Exception $e) {
            $this->error('خطأ أثناء الاستيراد: ' . $e->getMessage());
            return 1;
        }
        
        return 0;
    }
}