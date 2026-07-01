<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
 use App\Models\Notification;
class AuthController extends Controller
{
    // عرض صفحة تسجيل الدخول
    public function showLoginForm()
    {
        return view("auth.login");
    }

    // معالج تسجيل الدخول
   public function login(Request $request)
{
    $credentials = $request->validate([
        "email" => ["required", "email"],
        "password" => ["required"],
    ]);

    if (Auth::attempt($credentials, $request->remember)) {
        $request->session()->regenerate();

        $user = Auth::user();
        
        // التوجيه حسب البريد الإلكتروني مباشرة (حل مؤقت)
        if ($user->email === 'admin@alhilal.com' || $user->email === 'superadmin@alhilal.com') {
            return redirect()->to('/consultant/dashboard');
        }
        
        return redirect()->to('/dashboard');
    }

    throw ValidationException::withMessages([
        "email" => ["البريد الإلكتروني أو كلمة المرور غير صحيحة."],
    ]);
}

    // تسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }

    // عرض صفحة إنشاء حساب
    public function showRegisterForm()
    {
        return view("auth.register");
    }

    // معالج إنشاء حساب جديد
    public function register(Request $request)
    {
        $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "email", "max:255", "unique:users"],
            "password" => ["required", "string", "min:8", "confirmed"],
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => 4, // الطالب العادي
        ]);

        StudentProfile::create(["user_id" => $user->id]);

        Auth::login($user);

        return redirect()->to('/dashboard')->with("success", "تم إنشاء حسابك بنجاح!");
       

// بعد إنشاء المستخدم، أرسل إشعار ترحيبي
Notification::create([
    'user_id' => $user->id,
    'type' => 'success',
    'title' => 'مرحباً بك!',
    'message' => 'تم إنشاء حسابك بنجاح. يمكنك الآن تقديم استشاراتك ومتابعة طلباتك.',
    'link' => route('dashboard'),
    'is_read' => false,
]);
    }

    // عرض صفحة الملف الشخصي
    public function showProfile()
    {
        $user = Auth::user();
        $user->load("studentProfile");
        return view("profile.show", compact("user"));
    }

    // تحديث الملف الشخصي
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "email", "max:255", "unique:users,email," . $user->id],
            "phone" => ["nullable", "string", "max:20"],
            "nationality" => ["nullable", "string", "max:255"],
            "passport_number" => ["nullable", "string", "max:255"],
            "current_education_level" => ["nullable", "string", "max:255"],
            "birth_date" => ["nullable", "date"],
            "profile_photo" => ["nullable", "image", "max:2048"],
        ]);

        $user->update($request->only("name", "email"));

        if ($request->hasFile("profile_photo")) {
            $path = $request->file("profile_photo")->store("profile-photos", "public");
            $user->profile_photo = $path;
            $user->save();
        }

        $user->studentProfile()->updateOrCreate(
            ["user_id" => $user->id],
            $request->only("phone", "nationality", "passport_number", "current_education_level", "birth_date")
        );

        return back()->with("success", "تم تحديث ملفك الشخصي بنجاح!");
    }
}