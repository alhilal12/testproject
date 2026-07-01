<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Major;
use App\Models\College;
use App\Models\Institute;
use Illuminate\Http\Request;
use App\Models\CountryRecognition;
class UniversitiesController extends Controller
{
    public function index(Request $request)
    {
        $query = University::query();

        // 1. البحث بالاسم
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name_ar', 'like', "%{$search}%")
                  ->orWhere('name_tr', 'like', "%{$search}%");
            });
        }

        // 2. التصفية حسب النوع (حكومي/خاص)
        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        // 3. التصفية حسب المدينة
        if ($request->filled('city')) {
            $query->where('city', $request->input('city'));
        }

        // 4. التصفية حسب التخصص (ربط الجامعات بالتخصصات)
        if ($request->filled('major')) {
            $major = $request->input('major');
            $query->whereHas('majors', function ($q) use ($major) {
                $q->where('name_ar', 'like', "%{$major}%")
                  ->orWhere('name_en', 'like', "%{$major}%");
            });
        }


// 5. التصفية حسب لغة الدراسة (دعم اختيار متعدد)
if ($request->filled('language')) {
    $languages = (array) $request->input('language');
    $query->where(function ($q) use ($languages) {
        foreach ($languages as $lang) {
            // استخدام like للتأكد من compatibility
            $q->orWhere('languages', 'like', '%"' . $lang . '"%');
        }
    });
}

        // 6. التصفية حسب التقييم
        if ($request->filled('min_rating')) {
            $query->where('rating', '>=', $request->input('min_rating'));
        }
        if ($request->filled('max_rating')) {
            $query->where('rating', '<=', $request->input('max_rating'));
        }

        // 7. التصفية حسب الكلية
        if ($request->filled('college')) {
            $college = $request->input('college');
            $query->whereHas('colleges', function ($q) use ($college) {
                $q->where('name_ar', 'like', "%{$college}%");
            });
        }

        // 8. التصفية حسب المعهد
        if ($request->filled('institute')) {
            $institute = $request->input('institute');
            $query->whereHas('institutes', function ($q) use ($institute) {
                $q->where('name_ar', 'like', "%{$institute}%");
            });
        }

        // 9. الترتيب
        $sort = $request->input('sort', 'rank_local');
        switch ($sort) {
            case 'name_ar':
                $query->orderBy('name_ar', 'asc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'rank_local':
            default:
                $query->orderBy('rank_local', 'asc');
                break;
        }

        // 10. عدد النتائج لكل صفحة
        $perPage = $request->input('per_page', 12);
        $universities = $perPage == 'all' 
            ? $query->paginate($query->count())
            : $query->paginate((int)$perPage);

        // 11. البيانات المساعدة للفلتر
        $cities = University::distinct('city')->pluck('city')->sort();
        $majors = Major::orderBy('name_ar')->get();
        $colleges = College::orderBy('name_ar')->get();
        $institutes = Institute::orderBy('name_ar')->get();

        return view('universities.index', compact('universities', 'cities', 'majors', 'colleges', 'institutes'));
    }

public function show($id)
{
    $university = University::with(['colleges.majors', 'institutes.majors','postgraduateQuotas'])->findOrFail($id);

    return view('universities.show', compact('university'));
}

    public function searchMajors(Request $request)
    {
        $query = $request->input('query');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }
        
        $majors = Major::where('name_ar', 'like', "%{$query}%")
                       ->orWhere('name_en', 'like', "%{$query}%")
                       ->limit(10)
                       ->get(['id', 'name_ar', 'name_en']);
        
        return response()->json($majors);
    }
 public function ranking()
{
    $universities = University::whereNotNull('rank_local')
        ->orderBy('rank_local', 'asc')
        ->get(['id', 'name_ar', 'name_tr', 'rank_local', 'city', 'type']);
    
    return view('universities.ranking', compact('universities'));
}


public function recognitions(Request $request)
{
    // جلب جميع الدول التي لديها جامعات معترف بها
    $countriesQuery = CountryRecognition::with('university')
        ->whereHas('university', function($q) {
            $q->where('is_active', true);
        });

    // فلترة حسب الدولة
    if ($request->filled('country')) {
        $countriesQuery->where('country_code', $request->country);
    }

    $countries = $countriesQuery->get()
        ->groupBy('country_code')
        ->map(function($group) {
            return [
                'country_name_ar' => $group->first()->country_name_ar,
                'country_code' => $group->first()->country_code,
                'universities' => $group->map(function($item) {
                    return $item->university;
                })->unique('id')->values()
            ];
        })
        ->sortBy('country_name_ar')
        ->values();

    return view('universities.recognitions', compact('countries'));
}
}