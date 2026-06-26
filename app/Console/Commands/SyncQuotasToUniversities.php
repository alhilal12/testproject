<?php

namespace App\Console\Commands;

use App\Models\University;
use App\Models\UniversityQuota;
use Illuminate\Console\Command;

class SyncQuotasToUniversities extends Command
{
    protected $signature = 'sync:quotas-to-universities';
    protected $description = 'ربط بيانات التقويم بالجامعات بناءً على تطابق الأسماء';

    public function handle()
    {
        $quotas = UniversityQuota::whereNull('university_id')->get();
        $updated = 0;

        foreach ($quotas as $quota) {
            $university = University::where('name_tr', $quota->university_name_tr)
                ->orWhere('name_ar', $quota->university_name_ar)
                ->first();

            if ($university) {
                $quota->university_id = $university->id;
                $quota->save();
                $updated++;
                $this->info("✅ ربط: {$quota->university_name_tr} → {$university->name_ar}");
            }
        }

        $this->info("تم ربط {$updated} من أصل {$quotas->count()} سجل");
    }
}