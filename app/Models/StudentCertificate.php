<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'certificate_type',
        'title',
        'issue_date',
        'expiry_date',
        'file_path',
        'grade_score',
        'is_verified',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
