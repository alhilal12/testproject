<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consultation extends Model
{
    protected $fillable = [
        // 'student_id',
        'user_id',  
        'university_id',
        'major_id',
        'education_level',
        'study_language',
        'message',
        'attachment',
        'status',
        'admin_reply',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
 public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }

    // حالة الطلب بالعربية
    public function getStatusTextAttribute(): string
    {
        return match($this->status) {
            'pending' => 'قيد الانتظار',
            'processing' => 'قيد المعالجة',
            'replied' => 'تم الرد',
            'completed' => 'مكتمل',
            default => 'غير معروف',
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'yellow',
            'processing' => 'blue',
            'replied' => 'green',
            'completed' => 'gray',
            default => 'gray',
        };
    }
}