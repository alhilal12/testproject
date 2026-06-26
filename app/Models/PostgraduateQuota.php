<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostgraduateQuota extends Model
{
    protected $table = 'postgraduate_quotas';

   protected $fillable = [
    'competition_number',
    'university_name_tr',
    'institute', 
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
    'university_id',
];

    protected $casts = [
        'registration_start' => 'date',
        'registration_end' => 'date',
        'results_date' => 'date',
        'accepted_certificates' => 'array',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}