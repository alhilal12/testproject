<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversitiesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\UniversityManagementController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UniversityQuotaController;
use App\Http\Controllers\Admin\CountryRecognitionController;
use App\Models\Setting;

// ========================
// الصفحة الرئيسية
// ========================
Route::get('/', [HomeController::class, 'index'])->name('home');

// ========================
// الصفحات الثابتة
// ========================
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ========================
// صفحات الجامعات (عامة)
// ========================
Route::get('/universities', [UniversitiesController::class, 'index'])->name('universities.index');
Route::get('/university/{id}', [UniversitiesController::class, 'show'])->name('universities.show');
Route::get('/api/majors/search', [UniversitiesController::class, 'searchMajors'])->name('api.majors.search');
Route::get('/university-ranking', [UniversitiesController::class, 'ranking'])->name('universities.ranking');
// في routes/web.php
Route::get('/الجامعات-المعترف-بها', [UniversitiesController::class, 'recognitions'])->name('universities.recognitions');
// ========================
// صفحات المصادقة (Auth)
// ========================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ========================
// صفحات المستخدم المسجل (Auth Required)
// ========================
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
  
    
    Route::get('/consultation/start', function () {
        return view('consultation.start');
    })->name('consultation.start');
    
    Route::get('/consultation/create', [ConsultationController::class, 'create'])->name('consultation.create');
    Route::post('/consultation/store', [ConsultationController::class, 'store'])->name('consultation.store');
    Route::get('/consultation/{id}', [ConsultationController::class, 'show'])->name('consultation.show');
    Route::get('/my-consultations', [ConsultationController::class, 'myConsultations'])->name('consultation.my');
});
// ========================
// صفحات المستشار والمدير (Admin & Super Admin)
// ========================
Route::middleware(['auth', 'role:admin,super_admin'])->prefix('consultant')->group(function () {
    // dashboard
    Route::get('/dashboard', [ConsultantController::class, 'dashboard'])->name('consultant.dashboard');
    
    // الاستشارات والردود
    Route::get('/consultation/{id}/reply', [ConsultantController::class, 'showReplyForm'])->name('consultant.reply.form');
    Route::post('/consultation/{id}/reply', [ConsultantController::class, 'reply'])->name('consultant.reply');
    Route::put('/consultation/{id}/status', [ConsultantController::class, 'updateStatus'])->name('consultant.update-status');
    
    // المستندات والتقارير
    Route::get('/students-documents', [ConsultantController::class, 'studentsDocuments'])->name('consultant.students-documents');
    Route::post('/documents/{id}/verify', [ConsultantController::class, 'verifyDocument'])->name('consultant.verify-document');
    Route::delete('/documents/{id}', [ConsultantController::class, 'deleteDocument'])->name('consultant.delete-document');
    Route::get('/contact-messages', [ConsultantController::class, 'contactMessages'])->name('consultant.contact-messages');
    Route::get('/reports', [ConsultantController::class, 'reports'])->name('consultant.reports');
    
    //  إعدادات التواصل -   
    Route::get('/contact-config', function () {
        return view('consultant.settings');
    })->name('consultant.contact.config');
    
   Route::post('/contact-config', function () {
    $data = request()->except('_token');
    
    foreach ($data as $key => $value) {
        // ✅ فقط إذا كانت القيمة غير فارغة
        if ($value !== null && $value !== '') {
            \App\Models\Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
    
    return back()->with('success', 'تم تحديث معلومات الاتصال بنجاح');
})->name('consultant.contact.config.update');
  
    
}); 
// ========================
// صفحات إدارة الجامعات (للمدير فقط)
// ========================
Route::middleware(['auth', 'role:admin,super_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/universities', [UniversityManagementController::class, 'index'])->name('universities.index');
    Route::get('/universities/create', [UniversityManagementController::class, 'create'])->name('universities.create');
    Route::post('/universities', [UniversityManagementController::class, 'store'])->name('universities.store');
    Route::get('/universities/{id}/edit', [UniversityManagementController::class, 'edit'])->name('universities.edit');
    Route::put('/universities/{id}', [UniversityManagementController::class, 'update'])->name('universities.update');
    Route::delete('/universities/{id}', [UniversityManagementController::class, 'destroy'])->name('universities.destroy');
    Route::resource('articles', App\Http\Controllers\Admin\ArticleController::class);
    // ✅ أضف هذه Routes للدول المعترف بها
Route::get('/universities/{id}/recognitions', [CountryRecognitionController::class, 'index'])
        ->name('universities.recognitions');
    
    Route::post('/universities/{id}/recognitions', [CountryRecognitionController::class, 'store'])
        ->name('universities.recognitions.store');
    
    Route::delete('/universities/{id}/recognitions/{recognitionId}', [CountryRecognitionController::class, 'destroy'])
        ->name('universities.recognitions.destroy');
});

// ========================
// ✅ Routes الكليات والمعاهد (خارج مجموعة admin لأن JavaScript تستخدمها بدون /admin)
// ========================
// كليات
Route::post('/universities/{id}/colleges', [UniversityManagementController::class, 'saveColleges']);


// معاهد
Route::post('/universities/{id}/institutes', [UniversityManagementController::class, 'saveInstitutes']);


// ========================
// الإشعارات
// ========================
Route::middleware(['auth'])->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-read');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
    Route::get('/notifications/unread-count', [NotificationController::class, 'unreadCount'])->name('notifications.unread-count');
});

// ========================
// المستندات 
// ========================
Route::middleware(['auth'])->group(function () {
    Route::get('/my-documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/my-documents/upload', [DocumentController::class, 'upload'])->name('documents.upload');
    Route::delete('/my-documents/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    
});

// ========================
// المقالات
// ========================
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::get('/article/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');

// ========================
// مفاضلات الجامعات
// ========================
Route::get('/تقويم-المفاضلات', [UniversityQuotaController::class, 'index'])
    ->name('university-quotas.index');
// ========================
// ✅ Routes الكليات والمعاهد (مهم جداً)
// ========================
Route::post('/universities/{id}/colleges', [App\Http\Controllers\Admin\UniversityManagementController::class, 'saveColleges']);
Route::post('/universities/{id}/institutes', [App\Http\Controllers\Admin\UniversityManagementController::class, 'saveInstitutes']);
Route::delete('/colleges/{collegeId}/majors/{majorId}', [App\Http\Controllers\Admin\UniversityManagementController::class, 'removeMajorFromCollege']);
Route::delete('/institutes/{instituteId}/majors/{majorId}', [App\Http\Controllers\Admin\UniversityManagementController::class, 'removeMajorFromInstitute']);
// 
Route::get('/storage-link', function () {
    $target = storage_path('app/public');
    $link = public_path('storage');
    if (file_exists($link)) {
        return 'Storage link already exists.';
    }
    symlink($target, $link);
    return 'Storage link created successfully!';
});
// Temporary route to update admin password
Route::get('/update-admin-password', function () {
    $email = 'admin@alhial.com'; // غيّر إلى بريد المدير الفعلي
    $newPassword = 'Admin@2025#Secure!';
    
    $user = App\Models\User::where('email', $email)->first();
    if ($user) {
        $user->password = bcrypt($newPassword);
        $user->save();
        return '✅ Password updated successfully for: ' . $admin@alhilal.com . '<br>New password: ' . $alhilal$19@0;
    }
    return '❌ User not found with email: ' . $admin@alhilal.com;
});
require __DIR__.'/auth.php';