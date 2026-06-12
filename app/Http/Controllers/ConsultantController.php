<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentDocument;
use App\Models\User;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Storage;
class ConsultantController extends Controller
{
   public function dashboard()
{
    $stats = [
        'total' => Consultation::count(),
        'pending' => Consultation::where('status', 'pending')->count(),
        'processing' => Consultation::where('status', 'processing')->count(),
        'replied' => Consultation::where('status', 'replied')->count(),
        'today' => Consultation::whereDate('created_at', today())->count(),
    ];

    $consultations = Consultation::with(['student', 'university', 'major'])
                        ->orderByRaw("FIELD(status, 'pending', 'processing', 'replied', 'completed')")
                        ->orderBy('created_at', 'desc')
                        ->paginate(15);

    // جلب رسائل الاتصال (بعد الإحصائيات، قبل الـ return)
    $contactMessages = ContactMessage::orderBy('created_at', 'desc')->paginate(10);
    
    // return واحد فقط في نهاية الدالة
    return view('consultant.dashboard', compact('stats', 'consultations', 'contactMessages'));
}

    public function showReplyForm($id)
    {
        $consultation = Consultation::with(['student', 'university', 'major'])->findOrFail($id);
        
        if (!Auth::user()->isAdmin() && !Auth::user()->isSuperAdmin()) {
            abort(403);
        }
        
        return view('consultant.reply', compact('consultation'));
    }
public function reports()
{
    // إحصائيات الاستشارات
    $consultations = Consultation::query();
    
    $stats = [
        'total' => $consultations->count(),
        'pending' => $consultations->clone()->where('status', 'pending')->count(),
        'processing' => $consultations->clone()->where('status', 'processing')->count(),
        'replied' => $consultations->clone()->where('status', 'replied')->count(),
        'completed' => $consultations->clone()->where('status', 'completed')->count(),
    ];
    
    // إحصائيات شهرية
    $monthlyStats = [];
    for ($i = 5; $i >= 0; $i--) {
        $month = now()->subMonths($i);
        $count = Consultation::whereYear('created_at', $month->year)
                            ->whereMonth('created_at', $month->month)
                            ->count();
        $monthlyStats[] = [
            'month' => $month->translatedFormat('F Y'),
            'count' => $count,
        ];
    }
    
    // أكثر الجامعات طلباً
    $topUniversities = Consultation::whereNotNull('university_id')
                        ->with('university')
                        ->select('university_id', \DB::raw('count(*) as total'))
                        ->groupBy('university_id')
                        ->orderBy('total', 'desc')
                        ->limit(5)
                        ->get();
    
    // أكثر التخصصات طلباً
    $topMajors = Consultation::whereNotNull('major_id')
                    ->with('major')
                    ->select('major_id', \DB::raw('count(*) as total'))
                    ->groupBy('major_id')
                    ->orderBy('total', 'desc')
                    ->limit(5)
                    ->get();
    
    // متوسط وقت الرد (بالساعات)
    $avgReplyTime = Consultation::whereNotNull('replied_at')
                    ->select(\DB::raw('AVG(TIMESTAMPDIFF(HOUR, created_at, replied_at)) as avg_hours'))
                    ->first();
    
    return view('consultant.reports', compact('stats', 'monthlyStats', 'topUniversities', 'topMajors', 'avgReplyTime'));
}
    public function reply(Request $request, $id)
    {
        $consultation = Consultation::findOrFail($id);
        
        $request->validate([
            'reply_message' => 'required|string|min:3|max:5000',
            'status' => 'required|in:processing,replied,completed',
        ]);

        $consultation->update([
            'admin_reply' => $request->reply_message,
            'status' => $request->status,
            'replied_at' => now(),
            'replied_by' => Auth::id(),
        ]);

        // إرسال إشعار للطالب
        Notification::create([
            'user_id' => $consultation->user_id,
            'type' => 'success',
            'title' => 'تم الرد على استشارتك',
            'message' => 'تم الرد على استشارتك رقم #' . $consultation->id . '. يمكنك الاطلاع على الرد من خلال حسابك.',
            'link' => route('consultation.show', $consultation->id),
            'is_read' => false,
        ]);

        return redirect()->route('consultant.dashboard')
                         ->with('success', 'تم إرسال الرد بنجاح!');
    }

    public function updateStatus(Request $request, $id)
    {
        $consultation = Consultation::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,processing,replied,completed',
        ]);

        $consultation->update([
            'status' => $request->status,
        ]);

        // AJAX request
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        // Normal request
        return redirect()->route('consultant.dashboard')
                         ->with('success', 'تم تحديث حالة الاستشارة بنجاح!');
    }

public function studentsDocuments()
{
    // جلب جميع المستندات مع بيانات الطالب
    $documents = StudentDocument::with('user')
                    ->orderBy('created_at', 'desc')
                    ->paginate(20);
    
    return view('consultant.students-documents', compact('documents'));
}

public function verifyDocument($id)
{
    $document = StudentDocument::findOrFail($id);
    $document->update(['is_verified' => true]);
    
    return back()->with('success', 'تم توثيق المستند بنجاح');
}
public function deleteDocument($id)
{
    $document = StudentDocument::findOrFail($id);
    Storage::disk('public')->delete($document->file_path);
    $document->delete();
    
    return back()->with('success', 'تم حذف المستند بنجاح');
}
}