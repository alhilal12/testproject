<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'message', 'user_id', 'ip_address', 'is_read'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
