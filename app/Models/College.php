<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = [ 'name_ar', 'order'];

    // ✅ العلاقة مع الجامعات (Many-to-Many)
    public function universities()
    {
        return $this->belongsToMany(University::class, 'college_university');
    }

    // ✅ العلاقة مع التخصصات (Many-to-Many)
    public function majors()
    {
        return $this->belongsToMany(Major::class, 'college_major');
    }

    
}