<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'category',
    ];

 
    public function consultations()
{
    return $this->hasMany(Consultation::class);
}
public function universities()
{
    return $this->belongsToMany(University::class, 'university_major', 'major_id', 'university_id');
}
}
