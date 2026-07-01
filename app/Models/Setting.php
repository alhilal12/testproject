<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];
    
    // دالة واحدة فقط لكل شيء
    public static function get($key)
    {
        return self::where('key', $key)->first()->value ?? null;
    }
}