<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    
 public function universities()
    {
        return $this->belongsToMany(University::class, 'institute_university')
                    ->withTimestamps();
    }

    protected $fillable = ['name_ar', 'order'];
    
    
    public function majors()
    {
        return $this->belongsToMany(Major::class, 'institute_major');
    }
}