<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UniversityProgram extends Model
{
    use HasFactory;

    protected $table = 'university_programs';

    protected $fillable = [
        'university_id',
        'program_name_ar',
        'program_name_tr',
        'level',
        'language',
        'fee',
        'duration',
        'description',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'fee' => 'decimal:2',
    ];

    // العلاقة مع الجامعة
    public function university()
    {
        return $this->belongsTo(University::class);
    }

    // دالة مساعدة للحصول على اسم المستوى بالعربية
    public function getLevelNameAttribute()
    {
        return match($this->level) {
            'bachelor' => 'بكالوريوس',
            'master' => 'ماجستير',
            'phd' => 'دكتوراه',
            'diploma' => 'دبلوم',
            default => $this->level,
        };
    }
}