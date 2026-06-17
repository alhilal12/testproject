<?php

namespace App\Http\Controllers;

use App\Models\UniversityQuota;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Institute;
use App\Models\PostgraduateQuota;

class UniversityQuotaController extends Controller
{
    
public function index(Request $request)
{
    // تحديد نوع التقويم (افتراضي: undergraduate)
    $type = $request->get('type', 'undergraduate');
    
    // اختيار الجدول المناسب
    if ($type === 'postgraduate') {
        $query = PostgraduateQuota::with('university');
        $title = 'تقويم الدراسات العليا';
        $description = 'مواعيد التقديم للماجستير والدكتوراه في الجامعات التركية';
        $viewType = 'postgraduate';
    } else {
        $query = UniversityQuota::with(['university.colleges', 'university.institutes']);
        $title = 'تقويم مفاضلات الجامعات التركية';
        $description = 'مواعيد التسجيل والشروط المطلوبة للتقديم في الجامعات التركية';
        $viewType = 'undergraduate';
    }

    // فلترة حسب المدينة
    if ($request->filled('city') && $request->city != 'all') {
        $query->where('city', 'LIKE', '%' . $request->city . '%');
    }

    // فلترة حسب الكلية (للمفاضلات العادية فقط)
    if ($viewType == 'undergraduate' && $request->filled('college')) {
        $collegeName = $request->college;
        $query->whereHas('university.colleges', function($q) use ($collegeName) {
            $q->where('name_ar', 'LIKE', '%' . $collegeName . '%');
        });
    }

    // فلترة حسب المعهد (للمفاضلات العادية فقط)
    if ($viewType == 'undergraduate' && $request->filled('institute')) {
        $instituteName = $request->institute;
        $query->whereHas('university.institutes', function($q) use ($instituteName) {
            $q->where('name_ar', 'LIKE', '%' . $instituteName . '%');
        });
    }

    // البحث حسب اسم الجامعة
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('university_name_tr', 'LIKE', "%{$search}%")
              ->orWhere('university_name_ar', 'LIKE', "%{$search}%");
        });
    }

    
    
    // جلب الكليات والمعاهد للقوائم المنسدلة (للمفاضلات العادية فقط)
    $colleges = College::orderBy('name_ar')->get();
    $institutes = Institute::orderBy('name_ar')->get();
    $cities = UniversityQuota::distinct('city')->whereNotNull('city')->pluck('city');
// إخفاء المفاضلات المنتهية
if ($request->has('hide_expired') && $request->hide_expired == 'true') {
    $query->where(function($q) {
        $q->whereNull('registration_end')
          ->orWhere('registration_end', '>=', now());
    });
}
$quotas = $query->orderBy('registration_end', 'asc')->paginate(20);
    return view('university-quotas.index', compact('quotas', 'cities', 'colleges', 'institutes', 'title', 'description', 'viewType'));
}
public function postgraduate(Request $request)
{
    $query = PostgraduateQuota::with('university');
    
    // نفس الفلاتر الموجودة في index
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('university_name_tr', 'LIKE', "%{$search}%")
              ->orWhere('university_name_ar', 'LIKE', "%{$search}%");
        });
    }
    
    if ($request->filled('city') && $request->city != 'all') {
        $query->where('city', 'LIKE', '%' . $request->city . '%');
    }
    
    $quotas = $query->orderBy('registration_start', 'asc')->paginate(20);
    $cities = PostgraduateQuota::distinct('city')->whereNotNull('city')->pluck('city');
    $colleges = College::orderBy('name_ar')->get();
    $institutes = Institute::orderBy('name_ar')->get();
    
    return view('postgraduate-quotas.index', compact('quotas', 'cities', 'colleges', 'institutes'));
}
}