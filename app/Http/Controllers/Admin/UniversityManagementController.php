<?php

namespace App\Http\Controllers\Admin;

use App\Models\UniversityQuota; 
use App\Models\College;        
use App\Models\Institute;  
use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\Major;
use App\Models\PostgraduateQuota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UniversityManagementController extends Controller
{
  public function index(Request $request)
{
    $query = University::query();

    // فلترة حسب الاسم
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function ($q) use ($search) {
            $q->where('name_ar', 'like', "%{$search}%")
              ->orWhere('name_tr', 'like', "%{$search}%");
        });
    }

    // فلترة حسب النوع
    if ($request->filled('type')) {
        $query->where('type', $request->input('type'));
    }

      $universities = $query->orderBy('name_ar')->paginate(15);
    
    return view('admin.universities.index', compact('universities'));
}

    public function create()
    {
        $majors = Major::orderBy('name_ar')->get();
        $unmatchedQuotas = UniversityQuota::whereNull('university_id')->get();
        return view('admin.universities.create', compact('majors', 'unmatchedQuotas'));
    }

  public function store(Request $request)
{
    
    $request->validate([
        'name_ar' => 'required|string|max:255|unique:universities',
        'name_tr' => 'required|string|max:255|unique:universities',
        'city' => 'required|string|max:255',
        'type' => 'required|in:public,private',
        'established_date' => 'nullable|integer|digits:4|min:1000|max:' . date('Y'),
        'website' => 'nullable|url|max:255',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'rank_local' => 'nullable|integer',
        'rank_global' => 'nullable|integer',
        'description' => 'nullable|string',
        'languages' => 'nullable|array',
        'video_url' => 'nullable|url',
    ]);

    $logoPath = null;
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('universities', 'public');
    }

    // معالجة اللغات
    $languages = null;
    if ($request->has('languages') && is_array($request->languages)) {
        $languages = json_encode(array_values(array_filter($request->languages)));
    }

    // إنشاء الجامعة
    $university = University::create([
        'name_ar' => $request->name_ar,
        'name_tr' => $request->name_tr,
        'city' => $request->city,
        'type' => $request->type,
        'established_date' => $request->established_date,
        'website' => $request->website,
        'logo' => $logoPath,
        'rank_local' => $request->rank_local,
        'rank_global' => $request->rank_global,
        'description' => $request->description,
        'languages' => $languages,
        'video_url' => $request->video_url,
    ]);

    // حفظ الكليات مع القسط والتخصصات
    if ($request->filled('colleges')) {
        $colleges = json_decode($request->colleges, true);
       
        if (is_array($colleges)) {
            $syncData = [];
            foreach ($colleges as $collegeData) {
                if (!empty($collegeData['name_ar'])) {
                    $college = College::firstOrCreate(
                        ['name_ar' => $collegeData['name_ar']],
                        ['order' => 0]
                    );
                    
                    $syncData[$college->id] = [
                        'fee' => $collegeData['fee'] ?? null,
                        'language' => $collegeData['language'] ?? null
                    ];
                    
                    if (!empty($collegeData['majors']) && is_array($collegeData['majors'])) {
                        $college->majors()->sync($collegeData['majors']);
                    }
                }
            }
            if (!empty($syncData)) {
                $university->colleges()->sync($syncData);
            }
        }
    }

    // حفظ المعاهد مع القسط والتخصصات
    if ($request->filled('institutes')) {
        $institutes = json_decode($request->institutes, true);
       
        if (is_array($institutes)) {
            $syncData = [];
            foreach ($institutes as $instituteData) {
                if (!empty($instituteData['name_ar'])) {
                    $institute = Institute::firstOrCreate(
                        ['name_ar' => $instituteData['name_ar']],
                        ['order' => 0]
                    );
                    
                    $syncData[$institute->id] = [
                        'fee' => $instituteData['fee'] ?? null,
                        'language' => $instituteData['language'] ?? null
                    ];
                    
                    if (!empty($instituteData['majors']) && is_array($instituteData['majors'])) {
                        $institute->majors()->sync($instituteData['majors']);
                    }
                }
            }
            if (!empty($syncData)) {
                $university->institutes()->sync($syncData);
            }
        }
    }

    // ربط المفاضلات المختارة
    if ($request->has('sync_quota_ids')) {
        foreach ($request->sync_quota_ids as $quotaId) {
            $quota = UniversityQuota::find($quotaId);
            if ($quota && is_null($quota->university_id)) {
                $quota->university_id = $university->id;
                $quota->save();
            }
        }
    }

    // ربط مفاضلات الدراسات العليا
    if ($request->has('sync_postgraduate_quota_ids')) {
        // PostgraduateQuota::where('university_id', $university->id)->update(['university_id' => null]);
        
        foreach ($request->sync_postgraduate_quota_ids as $quotaId) {
            $quota = PostgraduateQuota::find($quotaId);
            if ($quota) {
                $quota->university_id = $university->id;
                $quota->save();
            }
        }
    }

    // ✅ معالجة صور المعرض (بعد إنشاء الجامعة)
    if ($request->has('images')) {
        $imagesJson = $request->input('images');
        $imagesArray = json_decode($imagesJson, true);
        
        if (is_array($imagesArray) && count($imagesArray) > 0) {
            $savedImages = [];
            foreach ($imagesArray as $imageData) {
                if (str_starts_with($imageData, 'data:image')) {
                    $imagePath = $this->saveBase64Image($imageData, 'university-gallery');
                    if ($imagePath) {
                        $savedImages[] = $imagePath;
                    }
                } else {
                    $savedImages[] = $imageData;
                }
            }
            $university->images = json_encode($savedImages);
            $university->save();
        }
    }

    return redirect()->route('admin.universities.index')
                     ->with('success', 'تم إضافة الجامعة بنجاح!');
}

public function edit($id)
{
    // ✅ التصحيح: أضف withPivot
    $university = University::with([
        'colleges' => function($query) {
            $query->withPivot('fee', 'language');  // هذا مهم جداً!
        },
        'colleges.majors',
        'institutes' => function($query) {
            $query->withPivot('fee', 'language');  // هذا مهم جداً!
        },
        'institutes.majors', 
        'quotas',
        'programs' 
    ])->findOrFail($id);
    
    $majors = Major::orderBy('name_ar')->get();
    
    // جلب مفاضلات الدراسات العليا غير المرتبطة
    $unmatchedPostgraduateQuotas = \App\Models\PostgraduateQuota::whereNull('university_id')->get();
    
    // جلب مفاضلات الدراسات العليا المرتبطة بهذه الجامعة
    $linkedPostgraduateQuotas = \App\Models\PostgraduateQuota::where('university_id', $id)->get();
    
    // جلب مفاضلات العادية غير المرتبطة (للتأكد من عدم تكرار الكود)
    $unmatchedQuotas = \App\Models\UniversityQuota::whereNull('university_id')->get();
    
    return view('admin.universities.edit', compact('university', 'majors', 'unmatchedPostgraduateQuotas', 'linkedPostgraduateQuotas', 'unmatchedQuotas'));
}

 public function update(Request $request, $id)
{
    \Log::info('Deleted Programs:', ['deleted_programs' => $request->deleted_programs]);
    $university = University::findOrFail($id);

    $request->validate([
        'name_ar' => 'required|string|max:255|unique:universities,name_ar,' . $id,
        'name_tr' => 'required|string|max:255|unique:universities,name_tr,' . $id,
        'city' => 'required|string|max:255',
        'type' => 'required|in:public,private',
        'website' => 'nullable|url|max:255',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'rank_local' => 'nullable|integer',
        'rank_global' => 'nullable|integer',
        'description' => 'nullable|string',
        'video_url' => 'nullable|url',
    ]);

    $data = $request->only([
        'name_ar', 'name_tr', 'city', 'type', 'website', 
        'rank_local', 'rank_global', 'description', 'video_url', 'established_date'
    ]);

    // معالجة اللغات
    if ($request->has('languages') && is_array($request->languages)) {
        $data['languages'] = json_encode(array_values(array_filter($request->languages)));
    } else {
        $data['languages'] = null;
    }

    // معالجة الشعار
    if ($request->hasFile('logo')) {
        if ($university->logo) {
            Storage::disk('public')->delete($university->logo);
        }
        $data['logo'] = $request->file('logo')->store('universities', 'public');
    }

    $university->update($data);

    // ==========================================
    // حفظ الكليات مع القسط والتخصصات
    // ==========================================
    if ($request->filled('colleges')) {
        $collegesData = json_decode($request->colleges, true);
        if (is_array($collegesData)) {
            $syncData = [];
            foreach ($collegesData as $collegeItem) {
                if (empty($collegeItem['name_ar']) || !trim($collegeItem['name_ar'])) {
                    continue;
                }
                $college = College::firstOrCreate(
                    ['name_ar' => trim($collegeItem['name_ar'])],
                    ['order' => 0]
                );
                $feeValue = isset($collegeItem['fee']) && $collegeItem['fee'] !== '' ? $collegeItem['fee'] : null;
                $syncData[$college->id] = [
                    'fee' => $feeValue,
                    'language' => $collegeItem['language'] ?? null
                ];
                
                if (!empty($collegeItem['majors']) && is_array($collegeItem['majors'])) {
                    $college->majors()->sync($collegeItem['majors']);
                }
            }
            if (!empty($syncData)) {
                $university->colleges()->sync($syncData);
            } else {
                $university->colleges()->detach();
            }
        }
    } else {
        $university->colleges()->detach();
    }

    // ==========================================
    // حفظ المعاهد مع القسط والتخصصات
    // ==========================================
    if ($request->filled('institutes')) {
        $institutesData = json_decode($request->institutes, true);
        if (is_array($institutesData)) {
            $syncData = [];
            foreach ($institutesData as $instituteItem) {
                if (empty($instituteItem['name_ar']) || !trim($instituteItem['name_ar'])) {
                    continue;
                }
                $institute = Institute::firstOrCreate(
                    ['name_ar' => trim($instituteItem['name_ar'])],
                    ['order' => 0]
                );
                $feeValue = isset($instituteItem['fee']) && $instituteItem['fee'] !== '' ? $instituteItem['fee'] : null;
                $syncData[$institute->id] = [
                    'fee' => $feeValue,
                    'language' => $instituteItem['language'] ?? null
                ];
                
                if (!empty($instituteItem['majors']) && is_array($instituteItem['majors'])) {
                    $institute->majors()->sync($instituteItem['majors']);
                }
            }
            if (!empty($syncData)) {
                $university->institutes()->sync($syncData);
            } else {
                $university->institutes()->detach();
            }
        }
    } else {
        $university->institutes()->detach();
    }
// ==========================================
// حفظ البرامج الدراسية
// ==========================================
if ($request->has('programs')) {
    $programsData = json_decode($request->programs, true);
    
    // حذف البرامج المحددة للحذف
    if ($request->has('deleted_programs')) {
        $deletedPrograms = json_decode($request->deleted_programs, true);
        if (is_array($deletedPrograms) && count($deletedPrograms) > 0) {
            \App\Models\UniversityProgram::whereIn('id', $deletedPrograms)->delete();
        }
    }
    
    // تحديث أو إضافة البرامج
    if (is_array($programsData) && count($programsData) > 0) {
        foreach ($programsData as $programItem) {
            if (empty($programItem['program_name_ar']) || !trim($programItem['program_name_ar'])) {
                continue;
            }
            
            $programData = [
                'university_id' => $university->id,
                'program_name_ar' => trim($programItem['program_name_ar']),
                'program_name_tr' => $programItem['program_name_tr'] ?? null,
                'level' => $programItem['level'] ?? 'bachelor',
                'language' => $programItem['language'] ?? null,
                'fee' => !empty($programItem['fee']) ? $programItem['fee'] : null,
                'duration' => !empty($programItem['duration']) ? $programItem['duration'] : null,
                'description' => $programItem['description'] ?? null,
                'is_active' => isset($programItem['is_active']) ? $programItem['is_active'] : 1,
            ];
            
            if (!empty($programItem['id'])) {
                // تحديث برنامج موجود
                \App\Models\UniversityProgram::where('id', $programItem['id'])
                    ->where('university_id', $university->id)
                    ->update($programData);
            } else {
                // إضافة برنامج جديد
                \App\Models\UniversityProgram::create($programData);
            }
        }
    }
}
    // ربط المفاضلات
    if ($request->has('sync_quota_ids')) {
        // UniversityQuota::where('university_id', $university->id)->update(['university_id' => null]);
        foreach ($request->sync_quota_ids as $quotaId) {
            $quota = UniversityQuota::find($quotaId);
            if ($quota) {
                $quota->university_id = $university->id;
                $quota->save();
            }
        }
    } else {
      //  UniversityQuota::where('university_id', $university->id)->update(['university_id' => null]);
    }

    // ربط مفاضلات الدراسات العليا
    if ($request->has('sync_postgraduate_quota_ids')) {
        // PostgraduateQuota::where('university_id', $university->id)->update(['university_id' => null]);
        
        foreach ($request->sync_postgraduate_quota_ids as $quotaId) {
            $quota = PostgraduateQuota::find($quotaId);
            if ($quota) {
                $quota->university_id = $university->id;
                $quota->save();
            }
        }
    } else {
        // PostgraduateQuota::where('university_id', $university->id)->update(['university_id' => null]);
    }
// حذف الصور المحددة للحذف
// حذف الصور المحددة
if ($request->has('deleted_images')) {
    $deletedImages = json_decode($request->deleted_images, true);
    if (is_array($deletedImages) && count($deletedImages) > 0) {
        $oldImages = [];
        if ($university->images) {
            $oldImages = is_array($university->images) ? $university->images : json_decode($university->images, true);
            $oldImages = $oldImages ?? [];
        }
        
        // تصفية الصور (إزالة المحددة للحذف)
        $remainingImages = array_filter($oldImages, function($image) use ($deletedImages) {
            return !in_array($image, $deletedImages);
        });
        
        // حذف الملفات الفعلية من التخزين
        foreach ($deletedImages as $deletedImage) {
            if (Storage::disk('public')->exists($deletedImage)) {
                Storage::disk('public')->delete($deletedImage);
            }
        }
        
        $university->images = json_encode(array_values($remainingImages));
        $university->save();
    }
}
    // ✅ معالجة صور المعرض - دمج الصور القديمة مع الجديدة
if ($request->has('images')) {
    $imagesJson = $request->input('images');
    $newImages = json_decode($imagesJson, true);
    
    // جلب الصور القديمة الموجودة
    $oldImages = [];
    if ($university->images) {
        $oldImages = is_array($university->images) ? $university->images : json_decode($university->images, true);
        $oldImages = $oldImages ?? [];
    }
    
    // معالجة الصور الجديدة (تحويل Base64 إلى ملفات)
    $savedNewImages = [];
    if (is_array($newImages) && count($newImages) > 0) {
        foreach ($newImages as $imageData) {
            if (str_starts_with($imageData, 'data:image')) {
                // صورة جديدة (Base64)
                $imagePath = $this->saveBase64Image($imageData, 'university-gallery');
                if ($imagePath) {
                    $savedNewImages[] = $imagePath;
                }
            } else {
                // صورة موجودة مسبقاً (مسار)
                $savedNewImages[] = $imageData;
            }
        }
    }
    
    // دمج الصور القديمة مع الجديدة
    $allImages = array_merge($oldImages, $savedNewImages);
    $university->images = json_encode($allImages);
    $university->save();
}

    return redirect()->route('admin.universities.index')
                     ->with('success', 'تم تحديث الجامعة بنجاح!');
}

    public function destroy($id)
    {
        $university = University::findOrFail($id);
        
        // حذف الشعار إذا كان موجوداً
        if ($university->logo) {
            Storage::disk('public')->delete($university->logo);
        }
        
        // حذف العلاقات (الكليات والمعاهد والمفاضلات)
        $university->colleges()->detach();
        $university->institutes()->detach();
        $university->quotas()->update(['university_id' => null]);
        
        // حذف الجامعة
        $university->delete();
        
        return redirect()->route('admin.universities.index')
                         ->with('success', 'تم حذف الجامعة بنجاح');
    }
 private function saveBase64Image($base64, $folder)
{
    $imageData = explode(',', $base64);
    if (count($imageData) < 2) return null;
    
    $imageString = $imageData[1];
    $imageType = explode(';', explode('/', $imageData[0])[1])[0];
    
    $imageName = time() . '_' . uniqid() . '.' . $imageType;
    $path = $folder . '/' . $imageName;
    
    Storage::disk('public')->put($path, base64_decode($imageString));
    
    return $path;
}
    
}