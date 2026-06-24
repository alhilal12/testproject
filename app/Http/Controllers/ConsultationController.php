<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\University;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    // عرض صفحة طلب استشارة جديدة
    public function create()
    {
        $universities = University::orderBy('name_ar')->get();
        $majors = Major::orderBy('name_ar')->get();
        
        return view('consultation.create', compact('universities', 'majors'));
    }

    // تخزين طلب جديد
    public function store(Request $request)
    {
        $request->validate([
            'university_id' => 'nullable|exists:universities,id',  // جعلها اختيارية
            'major_id' => 'nullable|exists:majors,id',            // جعلها اختيارية
            'education_level' => 'nullable|in:bachelor,master,phd', // جعلها اختيارية
            'study_language' => 'nullable|in:turkish,english,arabic', // جعلها اختيارية
            'message' => 'required|string|min:3|max:1000',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120',
        ]);

       $attachmentPath = null;
if ($request->hasFile('attachment')) {
    $attachmentPath = $request->file('attachment')->store('consultations', 'public');
}

        $consultation = Consultation::create([
            'user_id' => Auth::id(),  // ✅ استخدم user_id وليس student_id
            'university_id' => $request->university_id,
            'major_id' => $request->major_id,
            'education_level' => $request->education_level,
            'study_language' => $request->study_language,
            'message' => $request->message,
            'attachment' => $attachmentPath,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'تم إرسال طلب الاستشارة بنجاح! سنتواصل معك قريباً.');
    }

    // عرض تفاصيل طلب معين
    public function show($id)
    {
        $consultation = Consultation::with(['university', 'major'])->findOrFail($id);
        
        // التأكد من أن المستخدم يملك هذا الطلب أو هو مسؤول
        if ($consultation->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }
        
        return view('consultation.show', compact('consultation'));
    }

    // عرض جميع طلبات المستخدم
    public function myConsultations()
    {
        $consultations = Consultation::with(['student', 'university', 'major'])
                    ->select('id', 'user_id', 'message', 'attachment', 'status', 'created_at', 'university_id', 'major_id')
                    ->orderByRaw("FIELD(status, 'pending', 'processing', 'replied', 'completed')")
                    ->orderBy('created_at', 'desc')
                    ->paginate(15);
        
        $stats = [
            'total' => Consultation::where('user_id', Auth::id())->count(),
            'pending' => Consultation::where('user_id', Auth::id())->where('status', 'pending')->count(),
            'processing' => Consultation::where('user_id', Auth::id())->where('status', 'processing')->count(),
            'replied' => Consultation::where('user_id', Auth::id())->where('status', 'replied')->count(),
            'completed' => Consultation::where('user_id', Auth::id())->where('status', 'completed')->count(),
        ];
        
        return view('consultation.my-consultations', compact('consultations', 'stats'));
    }
}