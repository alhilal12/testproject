<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // جلب استشارات المستخدم
        $consultations = Consultation::with(['university', 'major'])
                            ->where('user_id', Auth::id())
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
        
        // إحصائيات الاستشارات
        $stats = [
            'total' => Consultation::where('user_id', Auth::id())->count(),
            'pending' => Consultation::where('user_id', Auth::id())->where('status', 'pending')->count(),
            'processing' => Consultation::where('user_id', Auth::id())->where('status', 'processing')->count(),
            'replied' => Consultation::where('user_id', Auth::id())->where('status', 'replied')->count(),
            'completed' => Consultation::where('user_id', Auth::id())->where('status', 'completed')->count(),
        ];
        
        return view('dashboard', compact('user', 'consultations', 'stats'));
    }
}