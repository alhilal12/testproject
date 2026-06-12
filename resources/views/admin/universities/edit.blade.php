<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل جامعة - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .tab-active {
            background-color: #eab308;
            color: white;
        }

        .tab-inactive {
            background-color: #f3f4f6;
            color: #4b5563;
        }

        .tab-inactive:hover {
            background-color: #e5e7eb;
        }

        input,
        select,
        textarea {
            transition: all 0.2s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #eab308;
            box-shadow: 0 0 0 2px rgba(234, 179, 8, 0.2);
            outline: none;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <x-navbar />
    <div class="container mx-auto px-4 py-10 max-w-6xl">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">تعديل الجامعة: {{ $university->name_ar }}</h1>
            </div>

            <div class="flex flex-wrap border-b border-gray-200">
                <button onclick="showTab('basic')" id="tabBasic" class="tab-active px-6 py-3 font-semibold">المعلومات
                    الأساسية</button>
                <button onclick="showTab('colleges')" id="tabColleges"
                    class="tab-inactive px-6 py-3 font-semibold">الكليات والتخصصات</button>
                <button onclick="showTab('institutes')" id="tabInstitutes"
                    class="tab-inactive px-6 py-3 font-semibold">المعاهد والتخصصات</button>
                    <button onclick="showTab('programs')" id="tabPrograms"
    class="tab-inactive px-6 py-3 font-semibold transition">
    📚 البرامج الدراسية
</button>
            </div>

            <!-- Tab 1: المعلومات الأساسية -->
            <div id="basicTab" class="p-6">
                <form action="{{ route('admin.universities.update', $university->id) }}" method="POST"
                    enctype="multipart/form-data" id="universityForm">
                    @csrf @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div><label class="block font-semibold mb-2">🏫 الاسم (عربي) *</label><input type="text"
                                name="name_ar" value="{{ old('name_ar', $university->name_ar) }}" required
                                class="w-full px-4 py-2 border-2 rounded-lg"></div>
                        <div><label class="block font-semibold mb-2">🏛️ الاسم (تركي) *</label><input type="text"
                                name="name_tr" value="{{ old('name_tr', $university->name_tr) }}" required
                                class="w-full px-4 py-2 border-2 rounded-lg"></div>
                        <div><label class="block font-semibold mb-2">📍 المدينة *</label><input type="text" name="city"
                                value="{{ old('city', $university->city) }}" required
                                class="w-full px-4 py-2 border-2 rounded-lg"></div>
                        <div><label class="block font-semibold mb-2">🏷️ النوع *</label><select name="type"
                                class="w-full px-4 py-2 border-2 rounded-lg">
                                <option value="public" {{ $university->type == 'public' ? 'selected' : '' }}>🏢 حكومية
                                </option>
                                <option value="private" {{ $university->type == 'private' ? 'selected' : '' }}>🏛️ خاصة
                                </option>
                            </select></div>
                        <div><label class="block font-semibold mb-2">📅 تاريخ التأسيس</label><input type="text"
                                name="established_date"
                                value="{{ old('established_date', $university->established_date) }}"
                                placeholder="مثال: 1978" class="w-full px-4 py-2 border-2 rounded-lg"></div>
                        <div><label class="block font-semibold mb-2">🌐 الموقع الإلكتروني</label><input type="url"
                                name="website" value="{{ old('website', $university->website) }}"
                                class="w-full px-4 py-2 border-2 rounded-lg"></div>

                        <div class="col-span-2"><label class="block font-semibold mb-2">🌐 لغات التدريس</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                @php $currentLangs = is_array($university->languages) ? $university->languages : json_decode($university->languages, true) ?? []; @endphp
                                <label><input type="checkbox" name="languages[]" value="turkish" {{ in_array('turkish', $currentLangs) ? 'checked' : ''}}> 🇹🇷 تركي</label>
                                <label><input type="checkbox" name="languages[]" value="english" {{ in_array('english', $currentLangs) ? 'checked' : ''}}> 🇬🇧 إنجليزي</label>
                                <label><input type="checkbox" name="languages[]" value="arabic" {{ in_array('arabic', $currentLangs) ? 'checked' : ''}}> 🇸🇦 عربي</label>
                                <label><input type="checkbox" name="languages[]" value="german" {{ in_array('german', $currentLangs) ? 'checked' : ''}}> 🇩🇪 ألماني</label>
                                <label><input type="checkbox" name="languages[]" value="french" {{ in_array('french', $currentLangs) ? 'checked' : ''}}> 🇫🇷 فرنسي</label>
                                <label><input type="checkbox" name="languages[]" value="spanish" {{ in_array('spanish', $currentLangs) ? 'checked' : ''}}> 🇪🇸 إسباني</label>
                                <label><input type="checkbox" name="languages[]" value="italian" {{ in_array('italian', $currentLangs) ? 'checked' : ''}}> 🇮🇹 إيطالي</label>
                                <label><input type="checkbox" name="languages[]" value="russian" {{ in_array('russian', $currentLangs) ? 'checked' : ''}}> 🇷🇺 روسي</label>
                                <label><input type="checkbox" name="languages[]" value="russian" {{ in_array('russian', $currentLangs) ? 'checked' : ''}}>  بلغارية</label>
                                <label><input type="checkbox" name="languages[]" value="russian" {{ in_array('russian', $currentLangs) ? 'checked' : ''}}>  صينية</label>
                                <label><input type="checkbox" name="languages[]" value="russian" {{ in_array('russian', $currentLangs) ? 'checked' : ''}}>  كورية</label>
                                <label><input type="checkbox" name="languages[]" value="russian" {{ in_array('russian', $currentLangs) ? 'checked' : ''}}>  ارمينية</label>
                            </div>
                        </div>

                        <div class="col-span-2"><label class="block font-semibold mb-2">📅 ربط بيانات التقويم</label>
                            <div class="grid grid-cols-2 gap-2 border rounded-lg p-4 bg-gray-50 max-h-60 overflow-auto">
                                @php $allQuotas = \App\Models\UniversityQuota::all();
                                $linkedIds = $university->quotas->pluck('id')->toArray(); @endphp
                                @foreach($allQuotas as $quota)<label><input type="checkbox" name="sync_quota_ids[]"
                                        value="{{ $quota->id }}" {{ in_array($quota->id, $linkedIds) ? 'checked' : ''}}>
                                    {{ $quota->university_name_tr }} (مفاضلة
                                {{ $quota->competition_number }})</label>@endforeach
                            </div>
                        </div>
<!-- ربط التقويم - الدراسات العليا -->
<div class="col-span-1 md:col-span-2">
    <label class="block text-gray-700 font-semibold mb-2">🎓 ربط بيانات التقويم (الدراسات العليا)</label>
    <div class="grid grid-cols-2 gap-2 border rounded-lg p-4 bg-gray-50 max-h-60 overflow-y-auto">
        @php $unmatchedPostgraduateQuotas = \App\Models\PostgraduateQuota::whereNull('university_id')->get(); @endphp
        @forelse($unmatchedPostgraduateQuotas as $quota)
            <label class="flex items-center gap-2 cursor-pointer hover:bg-gray-100 p-1 rounded">
                <input type="checkbox" name="sync_postgraduate_quota_ids[]" value="{{ $quota->id }}"
                    class="rounded border-gray-300 text-yellow-500">
                <span class="text-sm text-gray-700">{{ $quota->university_name_tr }} (مفاضلة {{ $quota->competition_number }})</span>
            </label>
        @empty
            <p class="text-gray-500 col-span-2">لا توجد مفاضلات دراسات عليا غير مرتبطة</p>
        @endforelse
    </div>
</div>
                        <div><label class="block font-semibold mb-2">🎥 رابط الفيديو (YouTube)</label><input type="url"
                                name="video_url" value="{{ old('video_url', $university->video_url) }}"
                                class="w-full px-4 py-2 border-2 rounded-lg"></div>
                        <div><label class="block font-semibold mb-2">📊 الترتيب المحلي</label><input type="number"
                                name="rank_local" value="{{ old('rank_local', $university->rank_local) }}"
                                class="w-full px-4 py-2 border-2 rounded-lg"></div>
                        <div><label class="block font-semibold mb-2">🌍 الترتيب العالمي</label><input type="number"
                                name="rank_global" value="{{ old('rank_global', $university->rank_global) }}"
                                class="w-full px-4 py-2 border-2 rounded-lg"></div>
                        <div><label class="block font-semibold mb-2">🖼️ شعار الجامعة</label><input type="file"
                                name="logo" class="w-full px-4 py-2 border-2 rounded-lg">@if($university->logo)
                                    <div class="mt-2"><img src="{{ Storage::url($university->logo) }}"  loading="lazy"
                                class="w-16 h-16 object-cover rounded"></div>@endif
                        </div>
                        <div class="mt-4">
   <!-- قسم إدارة الدول المعترف بها -->
<div class="col-span-1 md:col-span-2 mt-4 pt-4 border-t border-gray-200">
    <div class="flex items-center justify-between bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-4 border border-green-200">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                <span class="text-xl">🌍</span>
            </div>
            <div>
                <h3 class="font-bold text-gray-800">الدول المعترف بها</h3>
                <p class="text-sm text-gray-500">إضافة وتعديل الدول التي تعترف بشهادة هذه الجامعة</p>
            </div>
        </div>
        <a href="{{ route('admin.universities.recognitions', $university->id) }}" 
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition duration-300 flex items-center gap-2 shadow-md hover:shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            إدارة الدول المعترف بها
        </a>
    </div>
</div>
</div>
<!-- صور المعرض (Gallery) -->
<div class="col-span-1 md:col-span-2">
    <label class="block text-gray-700 font-semibold mb-2">🖼️ صور المعرض (اختياري)</label>
    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 bg-gray-50">
        
        <!-- معاينة الصور الجديدة -->
        <div class="flex flex-wrap gap-4" id="gallery-preview"></div>
        
        <div class="mt-3">
            <!-- ✅ ضع حقل رفع الملفات هنا -->
            <input type="file" id="gallery-input" name="gallery[]" accept="image/*" multiple 
                   onchange="validateImageCount(this)"
                   class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
        </div>
        
        <p class="text-xs text-gray-400 mt-2">يمكنك اختيار 4-6 صور للجامعة (jpg, png, webp)</p>
        <input type="hidden" name="deleted_images" id="deletedImages" value="">
        <input type="hidden" name="images" id="images-input" value="">
    </div>
    
    <!-- الصور الحالية -->
    @if($university->images)
        @php 
            $existingImages = is_array($university->images) ? $university->images : json_decode($university->images, true); 
        @endphp
        @if(is_array($existingImages) && count($existingImages) > 0)
            <div class="mb-4 mt-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">الصور الحالية:</label>
                <div class="flex flex-wrap gap-3" id="existingGallery">
                    @foreach($existingImages as $index => $image)
                        <div class="relative group w-24 h-24 rounded-lg overflow-hidden shadow-md border-2 border-gray-200">
                            <img src="{{ asset('storage/' . $image) }}"  loading="lazy" class="w-full h-full object-cover">
                            <button type="button" onclick="removeExistingImage(this, '{{ $image }}')" 
                                class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600 transition opacity-0 group-hover:opacity-100">
                                ✕
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endif
</div>

    
</div>
                    </div>
                    <div class="mt-6"><label class="block font-semibold mb-2">📝 وصف الجامعة</label><textarea
                            name="description" rows="5"
                            class="w-full px-4 py-2 border-2 rounded-lg">{{ old('description', $university->description) }}</textarea>
                    </div>
                    <input type="hidden" name="colleges" id="collegesInput">
                    <input type="hidden" name="institutes"
                        id="institutesInput">
                        <input type="hidden" name="deleted_programs" id="deletedPrograms" value="">
                         <input type="hidden" name="programs" id="programsInput" value="">
                    <div class="flex gap-4 mt-8"><button type="submit"
                            class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 rounded-lg">💾 حفظ
                            التغييرات</button><a href="{{ route('admin.universities.index') }}"
                            class="flex-1 bg-gray-200 hover:bg-gray-300 text-center py-3 rounded-lg">❌ إلغاء</a></div>
                </form>
            </div>

            <!-- Tab 2: الكليات -->
            <div id="collegesTab" class="p-6 hidden">
                <div class="flex justify-between items-center mb-4 flex-wrap gap-2">
                    <h2 class="text-xl font-bold">الكليات والتخصصات</h2>
                    <div class="flex gap-2">
                        <button type="button" onclick="addCollege()"
                            class="bg-yellow-500 text-white px-4 py-2 rounded-lg">+ إضافة كلية</button>
                        <button type="button" onclick="showBulkAddColleges()"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg">📋 إضافة متعددة</button>
                    </div>
                </div>
                <div id="bulkAddColleges" class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200 hidden">
                    <h3 class="font-semibold text-blue-800">📝 إضافة كليات متعددة</h3>
                    <textarea id="bulkCollegesNames" rows="6"
                        class="w-full px-4 py-2 border rounded-lg mt-2"></textarea>
                    <div class="flex gap-2 mt-3"><button onclick="addBulkColleges()"
                            class="bg-green-500 text-white px-4 py-2 rounded-lg">➕ إضافة</button><button
                            onclick="hideBulkAddColleges()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">❌
                            إلغاء</button></div>
                </div>
                <div id="collegesList" class="space-y-4 max-h-96 overflow-auto p-2">
               @foreach($university->colleges as $college)
    <div class="border rounded-lg p-4 bg-gray-50" data-id="{{ $college->id }}">
        <div class="flex justify-between items-center mb-2 gap-2">
            <input type="text" class="college-name border rounded px-2 py-1 flex-1"
                value="{{ $college->name_ar }}" placeholder="اسم الكلية">
            <input type="number" class="college-fee border rounded px-2 py-1 w-32"
                value="{{ $college->pivot->fee ?? '' }}" placeholder="القسط">
            
            <!-- ✅ أضف هذا -->
            <select class="college-language border rounded px-2 py-1 w-32">
    <option value="">اللغة</option>
    <option value="turkish" {{ ($college->pivot->language ?? '') == 'turkish' ? 'selected' : '' }}>🇹🇷 تركي</option>
    <option value="english" {{ ($college->pivot->language ?? '') == 'english' ? 'selected' : '' }}>🇬🇧 إنجليزي</option>
    <option value="arabic" {{ ($college->pivot->language ?? '') == 'arabic' ? 'selected' : '' }}>🇸🇦 عربي</option>
    <option value="russian" {{ ($college->pivot->language ?? '') == 'russian' ? 'selected' : '' }}>🇷🇺 روسي</option>
    <option value="chinese" {{ ($college->pivot->language ?? '') == 'chinese' ? 'selected' : '' }}>🇨🇳 صيني</option>
</select>
            
            <button onclick="deleteCollege(this)" class="text-red-500 hover:text-red-700 px-2">🗑️</button>
        </div>
                            <div class="mr-6">
                                <div class="flex gap-2 mb-2">
                                    <select class="major-select border rounded px-2 py-1 flex-1">
                                        <option value="">-- اختر تخصص --</option>
                                        @foreach($majors as $major)<option value="{{ $major->id }}">{{ $major->name_ar }}
                                        </option>@endforeach
                                    </select>
                                    <button onclick="addMajorToCollege(this)"
                                        class="bg-green-500 text-white px-3 py-1 rounded text-sm">+ إضافة تخصص</button>
                                </div>
                                <div class="majors-list space-y-1">
                                    @foreach($college->majors as $major)<div
                                        class="flex justify-between bg-white p-2 rounded" data-major-id="{{ $major->id }}">
                                        <span>{{ $major->name_ar }}</span><button
                                            onclick="removeMajorFromCollege(this, {{ $college->id }}, {{ $major->id }})"
                                    class="text-red-500 text-sm">حذف</button></div>@endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex gap-2 mt-4">
                   <button onclick="saveCollegesToMemory()" class="bg-blue-500... hidden">💾 حفظ الكليات</button>
                    <button onclick="clearAllColleges()" class="bg-red-500 text-white px-6 py-2 rounded-lg">🗑️ حذف
                        الكل</button></div>
            </div>

            <!-- Tab 3: المعاهد -->
            <div id="institutesTab" class="p-6 hidden">
                <div class="flex justify-between items-center mb-4 flex-wrap gap-2">
                    <h2 class="text-xl font-bold">المعاهد والتخصصات</h2>
                    <div class="flex gap-2">
                        <button type="button" onclick="addInstitute()"
                            class="bg-yellow-500 text-white px-4 py-2 rounded-lg">+ إضافة معهد</button>
                        <button type="button" onclick="showBulkAddInstitutes()"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg">📋 إضافة متعددة</button>
                    </div>
                </div>
                <div id="bulkAddInstitutes" class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200 hidden">
                    <h3 class="font-semibold text-blue-800">📝 إضافة معاهد متعددة</h3>
                    <textarea id="bulkInstitutesNames" rows="6"
                        class="w-full px-4 py-2 border rounded-lg mt-2"></textarea>
                    <div class="flex gap-2 mt-3"><button onclick="addBulkInstitutes()"
                            class="bg-green-500 text-white px-4 py-2 rounded-lg">➕ إضافة</button><button
                            onclick="hideBulkAddInstitutes()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">❌
                            إلغاء</button></div>
                </div>
                <div id="institutesList" class="space-y-4 max-h-96 overflow-auto p-2">
          @foreach($university->institutes as $institute)
    <div class="border rounded-lg p-4 bg-gray-50" data-id="{{ $institute->id }}">
        <div class="flex justify-between items-center mb-2 gap-2">
            <input type="text" class="institute-name border rounded px-2 py-1 flex-1"
                value="{{ $institute->name_ar }}" placeholder="اسم المعهد">
            <input type="number" class="institute-fee border rounded px-2 py-1 w-32"
                value="{{ $institute->pivot->fee ?? '' }}" placeholder="القسط">
            
            <!-- ✅ أضف هذا -->
            <select class="institute-language border rounded px-2 py-1 w-32">
    <option value="">اللغة</option>
    <option value="turkish" {{ ($institute->pivot->language ?? '') == 'turkish' ? 'selected' : '' }}>🇹🇷 تركي</option>
    <option value="english" {{ ($institute->pivot->language ?? '') == 'english' ? 'selected' : '' }}>🇬🇧 إنجليزي</option>
    <option value="arabic" {{ ($institute->pivot->language ?? '') == 'arabic' ? 'selected' : '' }}>🇸🇦 عربي</option>
    <option value="russian" {{ ($institute->pivot->language ?? '') == 'russian' ? 'selected' : '' }}>🇷🇺 روسي</option>
    <option value="chinese" {{ ($institute->pivot->language ?? '') == 'chinese' ? 'selected' : '' }}>🇨🇳 صيني</option>
</select>
            
            <button onclick="deleteInstitute(this)" class="text-red-500 hover:text-red-700 px-2">🗑️</button>
        </div>
                            <div class="mr-6">
                                <div class="flex gap-2 mb-2">
                                    <select class="institute-major-select border rounded px-2 py-1 flex-1">
                                        <option value="">-- اختر تخصص --</option>
                                        @foreach($majors as $major)<option value="{{ $major->id }}">{{ $major->name_ar }}
                                        </option>@endforeach
                                    </select>
                                    <button onclick="addMajorToInstitute(this)"
                                        class="bg-green-500 text-white px-3 py-1 rounded text-sm">+ إضافة تخصص</button>
                                </div>
                                <div class="institute-majors-list space-y-1">
                                    @foreach($institute->majors as $major)<div
                                        class="flex justify-between bg-white p-2 rounded" data-major-id="{{ $major->id }}">
                                        <span>{{ $major->name_ar }}</span><button
                                            onclick="removeMajorFromInstitute(this, {{ $institute->id }}, {{ $major->id }})"
                                    class="text-red-500 text-sm">حذف</button></div>@endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex gap-2 mt-4"><button onclick="saveInstitutesToMemory()"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg">💾 حفظ المعاهد</button><button
                        onclick="clearAllInstitutes()" class="bg-red-500 text-white px-6 py-2 rounded-lg">🗑️ حذف
                        الكل</button></div>
            </div>
        </div>
        <!-- Tab 4: البرامج الدراسية -->
<div id="programsTab" class="p-6 hidden">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">📚 البرامج الدراسية</h2>
        <button type="button" onclick="addProgram()"
            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">
            + إضافة برنامج
        </button>
    </div>
    
    <div id="programsList" class="space-y-4 max-h-96 overflow-y-auto p-2">
        @foreach($university->programs as $program)
            <div class="border rounded-lg p-4 bg-gray-50 program-item" data-id="{{ $program->id }}">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-3">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">اسم البرنامج (عربي) *</label>
                        <input type="text" class="program-name-ar border rounded px-3 py-2 w-full" 
                               value="{{ $program->program_name_ar }}" placeholder="مثال: إدارة الأعمال">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">اسم البرنامج (تركي)</label>
                        <input type="text" class="program-name-tr border rounded px-3 py-2 w-full" 
                               value="{{ $program->program_name_tr }}" placeholder="مثال: İşletme">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">المستوى *</label>
                        <select class="program-level border rounded px-3 py-2 w-full">
                            <option value="bachelor" {{ $program->level == 'bachelor' ? 'selected' : '' }}>🎓 بكالوريوس</option>
                            <option value="master" {{ $program->level == 'master' ? 'selected' : '' }}>📖 ماجستير</option>
                            <option value="phd" {{ $program->level == 'phd' ? 'selected' : '' }}>📚 دكتوراه</option>
                            <option value="diploma" {{ $program->level == 'diploma' ? 'selected' : '' }}>📜 دبلوم</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-3">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">لغة الدراسة</label>
                        <select class="program-language border rounded px-3 py-2 w-full">
                            <option value="">اختر اللغة</option>
                            <option value="turkish" {{ $program->language == 'turkish' ? 'selected' : '' }}>🇹🇷 تركي</option>
                            <option value="english" {{ $program->language == 'english' ? 'selected' : '' }}>🇬🇧 إنجليزي</option>
                            <option value="arabic" {{ $program->language == 'arabic' ? 'selected' : '' }}>🇸🇦 عربي</option>
                            <option value="russian" {{ $program->language == 'russian' ? 'selected' : '' }}>🇷🇺 روسي</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">الرسوم ($)</label>
                        <input type="number" class="program-fee border rounded px-3 py-2 w-full" 
                               value="{{ $program->fee }}" placeholder="مثال: 5000" step="0.01">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">المدة (سنوات)</label>
                        <input type="number" class="program-duration border rounded px-3 py-2 w-full" 
                               value="{{ $program->duration }}" placeholder="مثال: 4" step="1">
                    </div>
                    <div class="flex items-end">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="program-active rounded border-gray-300 text-yellow-500" 
                                   {{ $program->is_active ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700">نشط</span>
                        </label>
                        <button type="button" onclick="deleteProgram(this, {{ $program->id }})" 
                                class="text-red-500 hover:text-red-700 mr-3">🗑️ حذف</button>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">وصف البرنامج</label>
                    <textarea class="program-description border rounded px-3 py-2 w-full" rows="2" 
                              placeholder="وصف مختصر للبرنامج...">{{ $program->description }}</textarea>
                </div>
            </div>
        @endforeach
    </div>
    
   
    
    <div class="mt-4 flex gap-2">
        <button type="button" onclick="saveProgramsToMemory()" 
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
            💾 حفظ البرامج
        </button>
    </div>
</div>
    </div>
<script>
    // معالجة صور المعرض
const galleryInput = document.getElementById('gallery-input');
const galleryPreview = document.getElementById('gallery-preview');
let imagesArray = [];

if (galleryInput) {
    galleryInput.addEventListener('change', function(e) {
        const files = Array.from(e.target.files);
        
        if (imagesArray.length + files.length > 6) {
            alert('يمكنك إضافة 4-6 صور كحد أقصى');
            return;
        }
        
        files.forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imagesArray.push(event.target.result);
                    updateGalleryPreview();
                };
                reader.readAsDataURL(file);
            }
        });
    });
}
function validateImageCount(input) {
    if (input.files.length < 4) {
        alert('⚠️ الرجاء اختيار 4 صور على الأقل');
        input.value = '';
    } else if (input.files.length > 6) {
        alert('⚠️ يمكنك اختيار 6 صور كحد أقصى');
        input.value = '';
    }
}
function updateGalleryPreview() {
    galleryPreview.innerHTML = '';
    imagesArray.forEach((img, index) => {
        const div = document.createElement('div');
        div.className = 'relative w-24 h-24 rounded-lg overflow-hidden shadow-md group';
        div.innerHTML = `
            <img src="${img}"  loading="lazy" class="w-full h-full object-cover">
            <button type="button" onclick="removeImage(${index})" 
                class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600 transition">
                ✕
            </button>
        `;
        galleryPreview.appendChild(div);
    });
    // ✅ تأكد من حفظ الصور في الحقل المخفي
    document.getElementById('images-input').value = JSON.stringify(imagesArray);
    console.log('Images to save:', imagesArray.length);
}
function removeExistingImage(btn, imagePath) {
    if (confirm('هل أنت متأكد من حذف هذه الصورة؟')) {
        // إخفاء الصورة من الواجهة
        const container = btn.closest('.relative');
        container.remove();
        
        // جمع الصور المراد حذفها
        let deletedImages = [];
        const deletedInput = document.getElementById('deletedImages');
        
        if (deletedInput && deletedInput.value) {
            deletedImages = JSON.parse(deletedInput.value);
        }
        deletedImages.push(imagePath);
        deletedInput.value = JSON.stringify(deletedImages);
        
        alert('تم تحديد الصورة للحذف: ' + imagePath);
    }
}
function removeImage(index) {
    imagesArray.splice(index, 1);
    updateGalleryPreview();
    console.log('Remaining images:', imagesArray.length);
}

// عند إرسال النموذج، تأكد من حفظ الصور
document.getElementById('universityForm').addEventListener('submit', function(e) {
    if (imagesArray.length > 0) {
        document.getElementById('images-input').value = JSON.stringify(imagesArray);
    }
});
    let currentUniversityId = {{ $university->id }};
    let csrfToken = '{{ csrf_token() }}';

    // ✅ دالة حفظ البيانات في الحقول المخفية
function saveAllDataToHiddenFields() {
    
    // حفظ الكليات
    let collegesData = [];
    $('#collegesList > .border').each(function() {
        let college = {
            name_ar: $(this).find('.college-name').val(),
            fee: $(this).find('.college-fee').val() || null,
            language: $(this).find('.college-language').val() || null,
            majors: $(this).find('.majors-list .flex').map(function() {
                return $(this).data('major-id');
            }).get()
        };
        if (college.name_ar && college.name_ar.trim() !== '') {
            collegesData.push(college);
        }
    });
    $('#collegesInput').val(JSON.stringify(collegesData));
    
    // حفظ المعاهد
    let institutesData = [];
    $('#institutesList > .border').each(function() {
        let institute = {
            name_ar: $(this).find('.institute-name').val(),
            fee: $(this).find('.institute-fee').val() || null,
            language: $(this).find('.institute-language').val() || null,
            majors: $(this).find('.institute-majors-list .flex').map(function() {
                return $(this).data('major-id');
            }).get()
        };
        if (institute.name_ar && institute.name_ar.trim() !== '') {
            institutesData.push(institute);
        }
    });
    $('#institutesInput').val(JSON.stringify(institutesData));
    
    // حفظ البرامج الدراسية
    let programs = [];
    $('#programsList .program-item').each(function() {
        const program = {
            id: $(this).data('id') || null,
            program_name_ar: $(this).find('.program-name-ar').val(),
            program_name_tr: $(this).find('.program-name-tr').val(),
            level: $(this).find('.program-level').val(),
            language: $(this).find('.program-language').val(),
            fee: $(this).find('.program-fee').val() || null,
            duration: $(this).find('.program-duration').val() || null,
            description: $(this).find('.program-description').val(),
            is_active: $(this).find('.program-active').is(':checked') ? 1 : 0,
        };
        if (program.program_name_ar && program.program_name_ar.trim() !== '') {
            programs.push(program);
        }
        
    });
    $('#programsInput').val(JSON.stringify(programs));
    
 // حفظ البرامج المحذوفة - تأكد من هذه الأسطر
if (window.deletedPrograms && Array.isArray(window.deletedPrograms) && window.deletedPrograms.length > 0) {
    $('#deletedPrograms').val(JSON.stringify(window.deletedPrograms));
    console.log('✅ Saving deleted programs:', window.deletedPrograms);
} else {
    $('#deletedPrograms').val('');
    console.log('⚠️ No deleted programs to save');
}
   
}
  function showTab(tab) {
    // ✅ حفظ البيانات تلقائيًا قبل تبديل التبويب
    saveAllDataToHiddenFields();
    
    // إخفاء كل التبويبات
    document.getElementById('basicTab').classList.add('hidden');
    document.getElementById('collegesTab').classList.add('hidden');
    document.getElementById('institutesTab').classList.add('hidden');
    document.getElementById('programsTab').classList.add('hidden');
    
    // إزالة التفعيل من كل الأزرار
    ['Basic', 'Colleges', 'Institutes', 'Programs'].forEach(t => {
        let btn = document.getElementById('tab' + t);
        if (btn) {
            btn.classList.remove('tab-active');
            btn.classList.add('tab-inactive');
        }
    });
    
    // إظهار التبويب المطلوب
    document.getElementById(tab + 'Tab').classList.remove('hidden');
    let activeTab = document.getElementById('tab' + tab.charAt(0).toUpperCase() + tab.slice(1));
    if (activeTab) {
        activeTab.classList.remove('tab-inactive');
        activeTab.classList.add('tab-active');
    }
}

    function escapeHtml(text) {
        if (!text) return '';
        return text.replace(/&/g, '&amp;')
                  .replace(/</g, '&lt;')
                  .replace(/>/g, '&gt;')
                  .replace(/"/g, '&quot;')
                  .replace(/'/g, '&#39;');
    }

    // ========== الكليات ==========
    function showBulkAddColleges() { 
        $('#bulkAddColleges').removeClass('hidden'); 
    }
    
    function hideBulkAddColleges() { 
        $('#bulkAddColleges').addClass('hidden'); 
        $('#bulkCollegesNames').val(''); 
    }

    function addBulkColleges() {
        let text = $('#bulkCollegesNames').val();
        if (!text.trim()) { 
            alert('الرجاء إدخال أسماء الكليات'); 
            return; 
        }
        let names = text.split(/\r?\n/).map(l => l.trim()).filter(n => n !== '');
        let added = 0;
        names.forEach(name => {
            let exists = false;
            $('#collegesList .college-name').each(function () { 
                if ($(this).val() === name) exists = true; 
            });
            if (!exists) { 
                addCollegeWithName(name); 
                added++; 
            }
        });
        alert("تم إضافة " + added + " كلية");
        hideBulkAddColleges();
        saveAllDataToHiddenFields(); // حفظ تلقائي بعد الإضافة
    }

   function addCollegeWithName(name = '') {
    let majorOptions = '';
    @foreach($majors as $major)
        majorOptions += '<option value="{{ $major->id }}">{{ $major->name_ar }}</option>';
    @endforeach
    
    let html = `
        <div class="border rounded-lg p-4 bg-gray-50">
            <div class="flex justify-between items-center mb-2 gap-2">
                <input type="text" class="college-name border rounded px-2 py-1 flex-1" 
                       value="${escapeHtml(name)}" placeholder="اسم الكلية *" required>
                <input type="number" class="college-fee border rounded px-2 py-1 w-32" 
                       placeholder="القسط (اختياري)" min="0" step="0.01"
                       onchange="saveAllDataToHiddenFields()">
                <select class="college-language border rounded px-2 py-1 w-32">
    <option value="">اللغة</option>
    <option value="turkish">🇹🇷 تركي</option>
    <option value="english">🇬🇧 إنجليزي</option>
    <option value="arabic">🇸🇦 عربي</option>
    <option value="russian">🇷🇺 روسي</option>
    <option value="chinese">🇨🇳 صيني</option>
</select>
                <button type="button" onclick="deleteCollege(this)" 
                        class="text-red-500 hover:text-red-700 px-2">🗑️</button>
            </div>
            <div class="mr-6">
                <div class="flex gap-2 mb-2">
                    <select class="major-select border rounded px-2 py-1 flex-1">
                        <option value="">-- اختر تخصص --</option>
                        ${majorOptions}
                    </select>
                    <button type="button" onclick="addMajorToCollege(this)" 
                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
                        + إضافة تخصص
                    </button>
                </div>
                <div class="majors-list space-y-1"></div>
            </div>
        </div>
    `;
    $('#collegesList').append(html);
}

    function addCollege() { 
        addCollegeWithName(''); 
    }
    
    function deleteCollege(btn) { 
        if (confirm('هل أنت متأكد من حذف هذه الكلية؟')) {
            $(btn).closest('.border').remove(); 
            saveAllDataToHiddenFields(); // حفظ تلقائي بعد الحذف
        }
    }

    function addMajorToCollege(btn) {
        const container = $(btn).closest('.mr-6');
        const select = container.find('.major-select');
        const majorId = select.val();
        const majorName = select.find('option:selected').text();
        
        if (!majorId) { 
            alert('الرجاء اختيار تخصص'); 
            return; 
        }
        
        const list = container.find('.majors-list');
        let exists = false;
        list.find('.flex').each(function () { 
            if ($(this).data('major-id') == majorId) exists = true; 
        });
        
        if (exists) { 
            alert('هذا التخصص مضاف مسبقاً'); 
            return; 
        }
        
        list.append(`
            <div class="flex justify-between items-center bg-white p-2 rounded mt-1" data-major-id="${majorId}">
                <span>${escapeHtml(majorName)}</span>
                <button type="button" onclick="$(this).parent().remove(); saveAllDataToHiddenFields();" 
                        class="text-red-500 hover:text-red-700 text-sm">🗑️ حذف</button>
            </div>
        `);
        
        select.val('');
        saveAllDataToHiddenFields(); // حفظ تلقائي بعد إضافة تخصص
    }

    function saveCollegesToMemory() {
        saveAllDataToHiddenFields();
        alert("تم حفظ البيانات في الذاكرة المؤقتة");
    }

    function clearAllColleges() { 
        if (confirm('هل أنت متأكد من حذف جميع الكليات؟ لا يمكن التراجع عن هذا الإجراء.')) { 
            $('#collegesList').empty(); 
            $('#collegesInput').val('');
        } 
    }

    // ========== المعاهد ==========
    function showBulkAddInstitutes() { 
        $('#bulkAddInstitutes').removeClass('hidden'); 
    }
    
    function hideBulkAddInstitutes() { 
        $('#bulkAddInstitutes').addClass('hidden'); 
        $('#bulkInstitutesNames').val(''); 
    }

    function addBulkInstitutes() {
        let text = $('#bulkInstitutesNames').val();
        if (!text.trim()) { 
            alert('الرجاء إدخال أسماء المعاهد'); 
            return; 
        }
        let names = text.split(/\r?\n/).map(l => l.trim()).filter(n => n !== '');
        let added = 0;
        names.forEach(name => {
            let exists = false;
            $('#institutesList .institute-name').each(function () { 
                if ($(this).val() === name) exists = true; 
            });
            if (!exists) { 
                addInstituteWithName(name); 
                added++; 
            }
        });
        alert("تم إضافة " + added + " معهد");
        hideBulkAddInstitutes();
        saveAllDataToHiddenFields(); // حفظ تلقائي بعد الإضافة
    }

 function addInstituteWithName(name = '') {
    let majorOptions = '';
    @foreach($majors as $major)
        majorOptions += '<option value="{{ $major->id }}">{{ $major->name_ar }}</option>';
    @endforeach
    
    let html = `
        <div class="border rounded-lg p-4 bg-gray-50">
            <div class="flex justify-between items-center mb-2 gap-2">
                <input type="text" class="institute-name border rounded px-2 py-1 flex-1" 
                       value="${escapeHtml(name)}" placeholder="اسم المعهد *" required>
                <input type="number" class="institute-fee border rounded px-2 py-1 w-32" 
                       placeholder="القسط (اختياري)" min="0" step="0.01"
                       onchange="saveAllDataToHiddenFields()">
                <select class="institute-language border rounded px-2 py-1 w-32">
    <option value="">اللغة</option>
    <option value="turkish">🇹🇷 تركي</option>
    <option value="english">🇬🇧 إنجليزي</option>
    <option value="arabic">🇸🇦 عربي</option>
    <option value="russian">🇷🇺 روسي</option>
    <option value="chinese">🇨🇳 صيني</option>
</select>
                <button type="button" onclick="deleteInstitute(this)" 
                        class="text-red-500 hover:text-red-700 px-2">🗑️</button>
            </div>
            <div class="mr-6">
                <div class="flex gap-2 mb-2">
                    <select class="institute-major-select border rounded px-2 py-1 flex-1">
                        <option value="">-- اختر تخصص --</option>
                        ${majorOptions}
                    </select>
                    <button type="button" onclick="addMajorToInstitute(this)" 
                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
                        + إضافة تخصص
                    </button>
                </div>
                <div class="institute-majors-list space-y-1"></div>
            </div>
        </div>
    `;
    $('#institutesList').append(html);
    console.log('Added institute with language select');
}

    function addInstitute() { 
        addInstituteWithName(''); 
    }
    
    function deleteInstitute(btn) { 
        if (confirm('هل أنت متأكد من حذف هذا المعهد؟')) {
            $(btn).closest('.border').remove(); 
            saveAllDataToHiddenFields(); // حفظ تلقائي بعد الحذف
        }
    }

    function addMajorToInstitute(btn) {
        const container = $(btn).closest('.mr-6');
        const select = container.find('.institute-major-select');
        const majorId = select.val();
        const majorName = select.find('option:selected').text();
        
        if (!majorId) { 
            alert('الرجاء اختيار تخصص'); 
            return; 
        }
        
        const list = container.find('.institute-majors-list');
        let exists = false;
        list.find('.flex').each(function () { 
            if ($(this).data('major-id') == majorId) exists = true; 
        });
        
        if (exists) { 
            alert('هذا التخصص مضاف مسبقاً'); 
            return; 
        }
        
        list.append(`
            <div class="flex justify-between items-center bg-white p-2 rounded mt-1" data-major-id="${majorId}">
                <span>${escapeHtml(majorName)}</span>
                <button type="button" onclick="$(this).parent().remove(); saveAllDataToHiddenFields();" 
                        class="text-red-500 hover:text-red-700 text-sm">🗑️ حذف</button>
            </div>
        `);
        
        select.val('');
        saveAllDataToHiddenFields(); // حفظ تلقائي بعد إضافة تخصص
    }

    function saveInstitutesToMemory() {
        saveAllDataToHiddenFields();
        alert("تم حفظ البيانات في الذاكرة المؤقتة");
    }

    function clearAllInstitutes() { 
        if (confirm('هل أنت متأكد من حذف جميع المعاهد؟ لا يمكن التراجع عن هذا الإجراء.')) { 
            $('#institutesList').empty(); 
            $('#institutesInput').val('');
        } 
    }

    function removeMajorFromCollege(btn, collegeId, majorId) {
        if (confirm('هل أنت متأكد من حذف هذا التخصص؟')) {
            $.ajax({ 
                url: '/colleges/' + collegeId + '/majors/' + majorId, 
                type: 'DELETE', 
                data: { 
                    _token: csrfToken,
                    _method: 'DELETE' 
                }, 
                success: function(res) { 
                    $(btn).parent().remove(); 
                    saveAllDataToHiddenFields();
                    alert('تم حذف التخصص بنجاح'); 
                },
                error: function() {
                    alert('حدث خطأ أثناء حذف التخصص');
                }
            });
        }
    }
    
    function removeMajorFromInstitute(btn, instituteId, majorId) {
        if (confirm('هل أنت متأكد من حذف هذا التخصص؟')) {
            $.ajax({ 
                url: '/institutes/' + instituteId + '/majors/' + majorId, 
                type: 'DELETE', 
                data: { 
                    _token: csrfToken,
                    _method: 'DELETE' 
                }, 
                success: function(res) { 
                    $(btn).parent().remove(); 
                    saveAllDataToHiddenFields();
                    alert('تم حذف التخصص بنجاح'); 
                },
                error: function() {
                    alert('حدث خطأ أثناء حذف التخصص');
                }
            });
        }
    }

// ========== تهيئة الصفحة ==========
$(document).ready(function () {
       window.deletedPrograms = [];
    // حفظ تلقائي عند تغيير أي حقل
    $(document).on('change keyup', '.college-name, .college-fee, .college-language, .institute-name, .institute-fee, .institute-language', function() {
        saveAllDataToHiddenFields();
    });
    
    // حفظ عند تقديم النموذج (مع language)
    $('#universityForm').on('submit', function(e) {
          saveAllDataToHiddenFields();
        // تأكد من جمع المعاهد أولاً
console.log('عدد المعاهد:', $('#institutesList > .border').length);
        // 1. جمع الكليات مع language
        let colleges = [];
        $('#collegesList > .border').each(function() {
            let collegeData = {
                name_ar: $(this).find('.college-name').val(),
                fee: $(this).find('.college-fee').val() || null,
                language: $(this).find('.college-language').val() || null,  // ✅ تمت الإضافة
                majors: $(this).find('.majors-list .flex').map(function() {
                    return $(this).data('major-id');
                }).get()
            };
            if (collegeData.name_ar && collegeData.name_ar.trim() !== '') {
                colleges.push(collegeData);
            }
        });
        $('#collegesInput').val(JSON.stringify(colleges));

         // 2. جمع المعاهد مع language ✅
    let institutes = [];
$('#institutesList > .border').each(function() {
    let instituteData = {
        name_ar: $(this).find('.institute-name').val(),
        fee: $(this).find('.institute-fee').val() || null,
        language: $(this).find('.institute-language').val() || null,
        majors: $(this).find('.institute-majors-list .flex').map(function() {
            return $(this).data('major-id');
        }).get()
    };
    if (instituteData.name_ar && instituteData.name_ar.trim() !== '') {
        institutes.push(instituteData);
    }
    
    // ✅ سجل اللغة لكل معهد على حدة داخل الحلقة
    console.log('Institute language:', instituteData.language);
});
$('#institutesInput').val(JSON.stringify(institutes));

console.log('Programs data:', document.getElementById('programsInput').value);
return true;
   });
    
    // حفظ أولي عند تحميل الصفحة
    saveAllDataToHiddenFields();
    
});  
// ========== البرامج الدراسية ==========
let programsData = [];

function addProgram() {
    const html = `
        <div class="border rounded-lg p-4 bg-gray-50 program-item new-program">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-3">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">اسم البرنامج (عربي) *</label>
                    <input type="text" class="program-name-ar border rounded px-3 py-2 w-full" placeholder="مثال: إدارة الأعمال">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">اسم البرنامج (تركي)</label>
                    <input type="text" class="program-name-tr border rounded px-3 py-2 w-full" placeholder="مثال: İşletme">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">المستوى *</label>
                    <select class="program-level border rounded px-3 py-2 w-full">
                        <option value="bachelor">🎓 بكالوريوس</option>
                        <option value="master">📖 ماجستير</option>
                        <option value="phd">📚 دكتوراه</option>
                        <option value="diploma">📜 دبلوم</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-3">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">لغة الدراسة</label>
                    <select class="program-language border rounded px-3 py-2 w-full">
                        <option value="">اختر اللغة</option>
                        <option value="turkish">🇹🇷 تركي</option>
                        <option value="english">🇬🇧 إنجليزي</option>
                        <option value="arabic">🇸🇦 عربي</option>
                        <option value="russian">🇷🇺 روسي</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">الرسوم ($)</label>
                    <input type="number" class="program-fee border rounded px-3 py-2 w-full" placeholder="مثال: 5000" step="0.01">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">المدة (سنوات)</label>
                    <input type="number" class="program-duration border rounded px-3 py-2 w-full" placeholder="مثال: 4" step="1">
                </div>
                <div class="flex items-end">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="program-active rounded border-gray-300 text-yellow-500" checked>
                        <span class="text-sm text-gray-700">نشط</span>
                    </label>
                    <button type="button" onclick="deleteProgram(this)" class="text-red-500 hover:text-red-700 mr-3">🗑️ حذف</button>
                </div>
            </div>
            <div>
    <label class="block text-sm font-semibold text-gray-700 mb-1">نوع البرنامج</label>
    <select class="program-description border rounded px-3 py-2 w-full">
        <option value="">اختر النوع</option>
        <option value="with thesis"> مع رسالة (With Thesis)</option>
        <option value="non thesis"> بدون رسالة (Non Thesis)</option>
    </select>
</div>
        </div>
    `;
    $('#programsList').append(html);
}

function deleteProgram(btn, programId = null) {
    if (confirm('هل أنت متأكد من حذف هذا البرنامج؟')) {
        const item = $(btn).closest('.program-item');
        
        if (programId) {
            if (!window.deletedPrograms) {
                window.deletedPrograms = [];
            }
            window.deletedPrograms.push(programId);
            console.log('✅ Added program to delete:', programId);
            console.log('✅ Current deletedPrograms array:', window.deletedPrograms);
        }
        
        item.remove();
        saveAllDataToHiddenFields();
    }
}

function saveProgramsToMemory() {
    let programs = [];
    $('#programsList .program-item').each(function() {
        const program = {
            id: $(this).data('id') || null,
            program_name_ar: $(this).find('.program-name-ar').val(),
            program_name_tr: $(this).find('.program-name-tr').val(),
            level: $(this).find('.program-level').val(),
            language: $(this).find('.program-language').val(),
            fee: $(this).find('.program-fee').val() || null,
            duration: $(this).find('.program-duration').val() || null,
            description: $(this).find('.program-description').val(),
            is_active: $(this).find('.program-active').is(':checked') ? 1 : 0,
        };
        if (program.program_name_ar && program.program_name_ar.trim() !== '') {
            programs.push(program);
        }
    });
    $('#programsInput').val(JSON.stringify(programs));
    if (window.deletedPrograms && Array.isArray(window.deletedPrograms)) {
        $('#deletedPrograms').val(JSON.stringify(window.deletedPrograms));
    }
    alert('تم حفظ ' + programs.length + ' برنامج');
}
console.log('deletedPrograms array:', window.deletedPrograms);
console.log('deletedPrograms input:', $('#deletedPrograms').val());
  console.log('✅ Programs saved, keeping deletedPrograms:', window.deletedPrograms);
</script>
</body>

</html>