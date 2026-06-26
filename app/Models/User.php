<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ========================
    // العلاقات (Relationships)
    // ========================
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    

    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'student_id');
    }

   
  

    

    public function scholarshipApplications()
    {
        return $this->hasMany(ScholarshipApplication::class, 'student_id');
    }




    public function studentCertificates()
    {
        return $this->hasMany(StudentCertificate::class, 'student_id');
    }

    // ========================
    // دوال الصلاحيات (Role Helpers)
    // ========================

    public function hasRole($roleName): bool
{
    // تحميل العلاقة إذا لم تكن محملة
    if (!$this->relationLoaded('role')) {
        $this->load('role');
    }
    
    if (!$this->role) {
        return false;
    }
    
    return $this->role->name === $roleName;
}

    public function isAdmin(): bool
{
    return $this->role?->name === 'admin' || $this->role?->name === 'super_admin';
}

    public function isConsultant(): bool
    {
        return $this->hasRole('admin') || $this->hasRole('super_admin');
    }

    public function isSuperAdmin(): bool
    {
        return $this->role?->name === 'super_admin';
    }

    public function isStudent(): bool
    {
        return $this->role?->name === 'student';
    }

    /**
     * تحديد صفحة التوجيه بعد تسجيل الدخول
     * (يمكن استخدامها في AuthController أو في LoginController)
     */
    public function redirectTo()
    {
        if ($this->isAdmin() || $this->isSuperAdmin()) {
            return '/consultant/dashboard';
        }
        
        return '/dashboard';
    }
    // في app/Models/User.php

public function notifications()
{
    return $this->hasMany(Notification::class)->latest();
}

public function unreadNotifications()
{
    return $this->hasMany(Notification::class)->where('is_read', false);
}
}