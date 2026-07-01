<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'established_date', 
        'name_ar',
        'name_tr',
        'city',
        'type',
        'website',
        'logo',
         'images',
        'rank_local',
        'rank_global',
        'description',
        'languages', 
        'video_url',
    ];

   

    public function majors()
    {
        return $this->belongsToMany(Major::class, 'university_major', 'university_id', 'major_id');
    }

    

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    // ✅ تمت إضافة withPivot('fee')
    public function colleges()
{
    return $this->belongsToMany(College::class, 'college_university')->withPivot('fee', 'language');
}

 // للمفاضلات العادية
public function quotas()
{
    return $this->hasMany(UniversityQuota::class, 'university_id');
}

// للمفاضلات الدراسات العليا
public function postgraduateQuotas()
{
    return $this->hasMany(PostgraduateQuota::class, 'university_id');
}
   public function institutes()
{
    return $this->belongsToMany(Institute::class, 'institute_university')->withPivot('fee', 'language');
}
// في app/Models/University.php

public function recognitions()
{
    return $this->hasMany(CountryRecognition::class);
}

// للحصول على الدول المعترف بها كمجموعة
public function getRecognizedCountriesAttribute()
{
    return $this->recognitions()->where('is_active', true)->get();
}
// العلاقة مع البرامج الدراسية
public function programs()
{
    return $this->hasMany(UniversityProgram::class)->orderBy('order');
}

// للحصول على البرامج النشطة فقط
public function activePrograms()
{
    return $this->hasMany(UniversityProgram::class)->where('is_active', true)->orderBy('order');
}
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'languages_json' => 'array',
        'images' => 'array',
    ];
}