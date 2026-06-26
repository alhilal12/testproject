<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityQuota extends Model
{
    use HasFactory;

    protected $table = 'university_quotas';

    protected $fillable = [
        'competition_number',
        'university_name_tr',
        'university_name_ar',
        'fee',
        'city',
        'registration_start',
        'registration_end',
        'results_date',
        'accepted_certificates',
        'details',
        'application_method',
        'local_rank',
    ];

    protected $casts = [
        'registration_start' => 'date',
        'registration_end' => 'date',
        'results_date' => 'date',
    ];
    // أضف العلاقة
public function university()
{
    return $this->belongsTo(University::class);
}

}