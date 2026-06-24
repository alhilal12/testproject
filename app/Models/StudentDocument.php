<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentDocument extends Model
{
    protected $fillable = ['user_id', 'type', 'file_path', 'original_name', 'is_verified'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}