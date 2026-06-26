<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryRecognition extends Model
{
    protected $fillable = [
        'university_id',
        'country_code',
        'country_name_ar',
        'country_name_en',
        'notes',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}