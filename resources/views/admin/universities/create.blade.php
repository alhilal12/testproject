<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة جامعة جديدة - الهلال للاستشارات التعليمية</title>
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
                <h1 class="text-2xl font-bold text-white">إضافة جامعة جديدة</h1>
            </div>

            <!-- Tabs -->
            <div class="flex flex-wrap border-b border-gray-200">
                <button onclick="showTab('basic')" id="tabBasic"
                    class="tab-active px-6 py-3 font-semibold transition">المعلومات الأساسية</button>
                <button onclick="showTab('colleges')" id="tabColleges"
                    class="tab-inactive px-6 py-3 font-semibold transition">الكليات والتخصصات</button>
                <button onclick="showTab('institutes')" id="tabInstitutes"
                    class="tab-inactive px-6 py-3 font-semibold transition">المعاهد والتخصصات</button>
                <button onclick="showTab('programs')" id="tabPrograms"
                    class="tab-inactive px-6 py-3 font-semibold transition">
                    البرامج الدراسية
                </button>
            </div>

            <!-- Tab 1: المعلومات الأساسية -->
            <div id="basicTab" class="p-6">
                <form action="{{ route('admin.universities.store') }}" method="POST" enctype="multipart/form-data"
                    id="universityForm">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">🏫 الاسم (عربي) *</label>
                            <input type="text" name="name_ar" value="{{ old('name_ar') }}" required
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">🏛️ الاسم (تركي) *</label>
                            <input type="text" name="name_tr" value="{{ old('name_tr') }}" required
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">📍 المدينة *</label>
                            <input type="text" name="city" value="{{ old('city') }}" required
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">🏷️ النوع *</label>
                            <select name="type" required
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                                <option value="">اختر النوع</option>
                                <option value="public" {{ old('type') == 'public' ? 'selected' : '' }}>🏢 حكومية</option>
                                <option value="private" {{ old('type') == 'private' ? 'selected' : '' }}>🏛️ خاصة</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">📅 تاريخ التأسيس</label>
                            <input type="text" name="established_date" value="{{ old('established_date') }}"
                                placeholder="مثال: 1978" pattern="[0-9]{4}" maxlength="4"
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,4)">
                            <p class="text-xs text-gray-400 mt-1">أدخل السنة فقط (مثال: 1978)</p>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">🌐 الموقع الإلكتروني</label>
                            <input type="url" name="website" value="{{ old('website') }}"
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                        </div>

                        <!-- لغات التدريس -->
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">🌐 لغات التدريس</label>
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                                <label
                                    class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-2 rounded"><input
                                        type="checkbox" name="languages[]" value="turkish"
                                        class="rounded border-gray-300 text-yellow-500"><span>🇹🇷 تركي</span></label>
                                <label
                                    class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-2 rounded"><input
                                        type="checkbox" name="languages[]" value="english"
                                        class="rounded border-gray-300 text-yellow-500"><span>🇬🇧
                                        إنجليزي</span></label>
                                <label
                                    class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-2 rounded"><input
                                        type="checkbox" name="languages[]" value="arabic"
                                        class="rounded border-gray-300 text-yellow-500"><span>🇸🇦 عربية</span></label>
                                <label
                                    class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-2 rounded"><input
                                        type="checkbox" name="languages[]" value="german"
                                        class="rounded border-gray-300 text-yellow-500"><span>🇩🇪
                                        ألمانية</span></label>
                                <label
                                    class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-2 rounded"><input
                                        type="checkbox" name="languages[]" value="french"
                                        class="rounded border-gray-300 text-yellow-500"><span>🇫🇷 فرنسية</span></label>
                                <label
                                    class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-2 rounded"><input
                                        type="checkbox" name="languages[]" value="spanish"
                                        class="rounded border-gray-300 text-yellow-500"><span>🇪🇸
                                        إسبانية</span></label>
                                <label
                                    class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-2 rounded"><input
                                        type="checkbox" name="languages[]" value="italian"
                                        class="rounded border-gray-300 text-yellow-500"><span>🇮🇹
                                        إيطالية</span></label>
                                <label
                                    class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-2 rounded"><input
                                        type="checkbox" name="languages[]" value="russian"
                                        class="rounded border-gray-300 text-yellow-500"><span>🇷🇺 روسية</span></label>
                                <label
                                    class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-2 rounded"><input
                                        type="checkbox" name="languages[]" value="russian"
                                        class="rounded border-gray-300 text-yellow-500"><span> كورية</span></label>
                                <label
                                    class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-2 rounded"><input
                                        type="checkbox" name="languages[]" value="russian"
                                        class="rounded border-gray-300 text-yellow-500"><span>ارمينية</span></label>
                                <label
                                    class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-2 rounded"><input
                                        type="checkbox" name="languages[]" value="russian"
                                        class="rounded border-gray-300 text-yellow-500"><span>بلغارية</span></label>
                                <label
                                    class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-2 rounded"><input
                                        type="checkbox" name="languages[]" value="russian"
                                        class="rounded border-gray-300 text-yellow-500"><span>صينية</span></label>
                            </div>
                        </div>

                        <!-- ربط التقويم -->
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">📅 ربط بيانات التقويم</label>
                            <div
                                class="grid grid-cols-2 gap-2 border rounded-lg p-4 bg-gray-50 max-h-60 overflow-y-auto">
                                @php $unmatchedQuotas = \App\Models\UniversityQuota::whereNull('university_id')->get(); @endphp
                                @forelse($unmatchedQuotas as $quota)
                                    <label class="flex items-center gap-2 cursor-pointer hover:bg-gray-100 p-1 rounded">
                                        <input type="checkbox" name="sync_quota_ids[]" value="{{ $quota->id }}"
                                            class="rounded border-gray-300 text-yellow-500">
                                        <span class="text-sm text-gray-700">{{ $quota->university_name_tr }} (مفاضلة
                                            {{ $quota->competition_number }})</span>
                                    </label>
                                @empty
                                    <p class="text-gray-500 col-span-2">لا توجد مفاضلات غير مرتبطة</p>
                                @endforelse
                            </div>
                        </div>
                        <!-- ربط التقويم - الدراسات العليا -->
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">🎓 ربط بيانات التقويم (الدراسات
                                العليا)</label>
                            <div
                                class="grid grid-cols-2 gap-2 border rounded-lg p-4 bg-gray-50 max-h-60 overflow-y-auto">
                                @php $unmatchedPostgraduateQuotas = \App\Models\PostgraduateQuota::whereNull('university_id')->get(); @endphp
                                @forelse($unmatchedPostgraduateQuotas as $quota)
                                    <label class="flex items-center gap-2 cursor-pointer hover:bg-gray-100 p-1 rounded">
                                        <input type="checkbox" name="sync_postgraduate_quota_ids[]" value="{{ $quota->id }}"
                                            class="rounded border-gray-300 text-yellow-500">
                                        <span class="text-sm text-gray-700">{{ $quota->university_name_tr }} (مفاضلة
                                            {{ $quota->competition_number }})</span>
                                    </label>
                                @empty
                                    <p class="text-gray-500 col-span-2">لا توجد مفاضلات دراسات عليا غير مرتبطة</p>
                                @endforelse
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">🎥 رابط الفيديو التعريفي
                                (YouTube)</label>
                            <input type="url" name="video_url" value="{{ old('video_url') }}"
                                placeholder="https://www.youtube.com/embed/XXXXXXXX"
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">📊 الترتيب المحلي</label>
                            <input type="number" name="rank_local" value="{{ old('rank_local') }}"
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">🌍 الترتيب العالمي</label>
                            <input type="number" name="rank_global" value="{{ old('rank_global') }}"
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">🖼️ شعار الجامعة</label>
                            <input type="file" name="logo" accept="image/*"
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                        </div>
                        <!-- صور المعرض (Gallery) -->
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">🖼️ صور المعرض (اختياري)</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 bg-gray-50">
                                <div class="flex flex-wrap gap-4" id="gallery-preview"></div>
                                <div class="mt-3">
                                    <input type="file" id="gallery-input" name="gallery[]" accept="image/*" multiple
                                        onchange="validateImageCount(this)"
                                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
                                </div>
                                <p class="text-xs text-gray-400 mt-2">يمكنك اختيار 4-6 صور للجامعة (jpg, png, webp)</p>
                                <input type="hidden" name="images" id="images-input" value="">
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-gray-700 font-semibold mb-2">📝 وصف الجامعة</label>
                        <textarea name="description" rows="5"
                            class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">{{ old('description') }}</textarea>
                    </div>

                    <input type="hidden" name="colleges" id="collegesInput" value="">
                    <input type="hidden" name="institutes" id="institutesInput" value="">

                    <div class="flex gap-4 mt-8">
                        <button type="submit"
                            class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 rounded-lg transition">💾
                            حفظ الجامعة</button>
                        <a href="{{ route('admin.universities.index') }}"
                            class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 rounded-lg text-center transition">❌
                            إلغاء</a>
                    </div>
                </form>
            </div>

            <!-- Tab 2: الكليات -->
            <div id="collegesTab" class="p-6 hidden">
                <div class="flex justify-between items-center mb-4 flex-wrap gap-2">
                    <h2 class="text-xl font-bold">الكليات والتخصصات</h2>
                    <div class="flex gap-2">
                        <button onclick="addCollege()"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">+ إضافة
                            كلية فردية</button>
                        <button onclick="showBulkAddColleges()"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">📋 إضافة
                            متعددة</button>
                    </div>
                </div>
                <div id="bulkAddColleges" class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200 hidden">
                    <h3 class="font-semibold text-blue-800 mb-2">📝 إضافة كليات متعددة دفعة واحدة</h3>
                    <p class="text-sm text-gray-600 mb-2">أدخل أسماء الكليات (كل كلية في سطر منفصل):</p>
                    <textarea id="bulkCollegesNames" rows="6"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
                    <div class="flex gap-2 mt-3">
                        <button onclick="addBulkColleges()"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition">➕
                            إضافة</button>
                        <button onclick="hideBulkAddColleges()"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg transition">❌
                            إلغاء</button>
                    </div>
                </div>
                <div id="collegesList" class="space-y-4 max-h-96 overflow-y-auto p-2"></div>
                <div class="flex gap-2 mt-4">
                    <button onclick="saveCollegesToMemory()"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition">💾 حفظ الكليات
                        في الذاكرة</button>
                    <button onclick="clearAllColleges()"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition">🗑️ حذف جميع
                        الكليات</button>
                </div>
                <p class="text-sm text-gray-500 mt-2">سيتم حفظ الكليات مع الجامعة عند الضغط على "حفظ الجامعة"</p>
            </div>

            <!-- Tab 3: المعاهد -->
            <div id="institutesTab" class="p-6 hidden">
                <div class="flex justify-between items-center mb-4 flex-wrap gap-2">
                    <h2 class="text-xl font-bold">المعاهد والتخصصات</h2>
                    <div class="flex gap-2">
                        <button onclick="addInstitute()"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">+ إضافة
                            معهد فردي</button>
                        <button onclick="showBulkAddInstitutes()"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">📋 إضافة
                            متعددة</button>
                    </div>
                </div>
                <div id="bulkAddInstitutes" class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200 hidden">
                    <h3 class="font-semibold text-blue-800 mb-2">📝 إضافة معاهد متعددة دفعة واحدة</h3>
                    <p class="text-sm text-gray-600 mb-2">أدخل أسماء المعاهد (كل معهد في سطر منفصل):</p>
                    <textarea id="bulkInstitutesNames" rows="6"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
                    <div class="flex gap-2 mt-3">
                        <button onclick="addBulkInstitutes()"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition">➕
                            إضافة</button>
                        <button onclick="hideBulkAddInstitutes()"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg transition">❌
                            إلغاء</button>
                    </div>
                </div>
                <div id="institutesList" class="space-y-4 max-h-96 overflow-y-auto p-2"></div>
                <div class="flex gap-2 mt-4">
                    <button onclick="saveInstitutesToMemory()"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition">💾 حفظ المعاهد
                        في الذاكرة</button>
                    <button onclick="clearAllInstitutes()"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition">🗑️ حذف جميع
                        المعاهد</button>
                </div>
                <p class="text-sm text-gray-500 mt-2">سيتم حفظ المعاهد مع الجامعة عند الضغط على "حفظ الجامعة"</p>
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

                <div id="programsList" class="space-y-4 max-h-96 overflow-y-auto p-2"></div>

                <input type="hidden" name="programs" id="programsInput" value="">

                <div class="mt-4 flex gap-2">
                    <button type="button" onclick="saveProgramsToMemory()"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                        💾 حفظ البرامج
                    </button>
                </div>
                <p class="text-sm text-gray-500 mt-2">سيتم حفظ البرامج مع الجامعة عند الضغط على "حفظ الجامعة"</p>
            </div>
        </div>
    </div>

    <script>
        // معالجة الصور 
        // معالجة صور المعرض
        const galleryInput = document.getElementById('gallery-input');
        const galleryPreview = document.getElementById('gallery-preview');
        let imagesArray = [];

        if (galleryInput) {
            galleryInput.addEventListener('change', function (e) {
                const files = Array.from(e.target.files);

                if (imagesArray.length + files.length > 6) {
                    alert('يمكنك إضافة 4-6 صور كحد أقصى');
                    return;
                }

                files.forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function (event) {
                            imagesArray.push(event.target.result);
                            updateGalleryPreview();
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
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
            document.getElementById('images-input').value = JSON.stringify(imagesArray);
        }

        function removeImage(index) {
            imagesArray.splice(index, 1);
            updateGalleryPreview();
        }

        // عند إرسال النموذج، تأكد من حفظ الصور
        document.getElementById('universityForm').addEventListener('submit', function (e) {
            if (imagesArray.length > 0) {
                document.getElementById('images-input').value = JSON.stringify(imagesArray);
            }
        });
        let csrfToken = '{{ csrf_token() }}';

        function showTab(tab) {
            document.getElementById('basicTab').classList.add('hidden');
            document.getElementById('collegesTab').classList.add('hidden');
            document.getElementById('institutesTab').classList.add('hidden');
            document.getElementById('programsTab').classList.add('hidden');

            document.getElementById('tabBasic').classList.remove('tab-active');
            document.getElementById('tabBasic').classList.add('tab-inactive');
            document.getElementById('tabColleges').classList.remove('tab-active');
            document.getElementById('tabColleges').classList.add('tab-inactive');
            document.getElementById('tabInstitutes').classList.remove('tab-active');
            document.getElementById('tabInstitutes').classList.add('tab-inactive');
            document.getElementById('tabPrograms').classList.remove('tab-active');
            document.getElementById('tabPrograms').classList.add('tab-inactive');

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
                       placeholder="القسط (اختياري)" min="0" step="0.01">
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
                <button type="button" onclick="$(this).parent().remove()" 
                        class="text-red-500 hover:text-red-700 text-sm">🗑️ حذف</button>
            </div>
        `);

            // إعادة تعيين الاختيار
            select.val('');
        }

        function saveCollegesToMemory() {
            let data = [];
            $('#collegesList > .border').each(function () {
                let collegeData = {
                    name_ar: $(this).find('.college-name').val(),
                    fee: $(this).find('.college-fee').val() || null,
                    language: $(this).find('.college-language').val() || null,
                    majors: $(this).find('.majors-list .flex').map(function () {
                        return $(this).data('major-id');
                    }).get()
                };
                if (collegeData.name_ar && collegeData.name_ar.trim() !== '') {
                    data.push(collegeData);
                }
            });
            $('#collegesInput').val(JSON.stringify(data));
            alert("تم حفظ " + data.length + " كلية في الذاكرة المؤقتة");
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
                       placeholder="القسط (اختياري)" min="0" step="0.01">
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
        }
        function addInstitute() {
            addInstituteWithName('');
        }

        function deleteInstitute(btn) {
            if (confirm('هل أنت متأكد من حذف هذا المعهد؟')) {
                $(btn).closest('.border').remove();
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
                <button type="button" onclick="$(this).parent().remove()" 
                        class="text-red-500 hover:text-red-700 text-sm">🗑️ حذف</button>
            </div>
        `);

            select.val('');
        }

        function saveInstitutesToMemory() {
            let data = [];
            $('#institutesList > .border').each(function () {
                let instituteData = {
                    name_ar: $(this).find('.institute-name').val(),
                    fee: $(this).find('.institute-fee').val() || null,
                    language: $(this).find('.institute-language').val() || null,
                    majors: $(this).find('.institute-majors-list .flex').map(function () {
                        return $(this).data('major-id');
                    }).get()
                };
                if (instituteData.name_ar && instituteData.name_ar.trim() !== '') {
                    data.push(instituteData);
                }
            });
            $('#institutesInput').val(JSON.stringify(data));
            alert("تم حفظ " + data.length + " معهد في الذاكرة المؤقتة");
        }

        function saveInstitutesToMemory() {
            let data = [];
            $('#institutesList > .border').each(function () {
                let instituteData = {
                    name_ar: $(this).find('.institute-name').val(),
                    fee: $(this).find('.institute-fee').val() || null,
                    language: $(this).find('.institute-language').val() || null,
                    majors: $(this).find('.institute-majors-list .flex').map(function () {
                        return $(this).data('major-id');
                    }).get()
                };
                if (instituteData.name_ar && instituteData.name_ar.trim() !== '') {
                    data.push(instituteData);
                }
            });
            $('#institutesInput').val(JSON.stringify(data));
            alert("تم حفظ " + data.length + " معهد في الذاكرة المؤقتة");
        }
        // ========== البرامج الدراسية ==========
        function addProgram() {
            const html = `
        <div class="border rounded-lg p-4 bg-gray-50 program-item">
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
                <label class="block text-sm font-semibold text-gray-700 mb-1">وصف البرنامج</label>
                <textarea class="program-description border rounded px-3 py-2 w-full" rows="2" placeholder="وصف مختصر للبرنامج..."></textarea>
            </div>
        </div>
    `;
            $('#programsList').append(html);
        }

        function deleteProgram(btn) {
            if (confirm('هل أنت متأكد من حذف هذا البرنامج؟')) {
                $(btn).closest('.program-item').remove();
            }
        }

        function saveProgramsToMemory() {
            let programs = [];
            $('#programsList .program-item').each(function () {
                const program = {
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
            alert('تم حفظ ' + programs.length + ' برنامج');
        }
        // ========== تهيئة الصفحة ==========
        $(document).ready(function () {
            // جمع البيانات عند تقديم النموذج
            $('#universityForm').on('submit', function (e) {
                // جمع الكليات
                let colleges = [];
                $('#collegesList > .border').each(function () {
                    let collegeData = {
                        name_ar: $(this).find('.college-name').val(),
                        fee: $(this).find('.college-fee').val() || null,
                        language: $(this).find('.college-language').val() || null,
                        majors: $(this).find('.majors-list .flex').map(function () {
                            return $(this).data('major-id');
                        }).get()
                    };
                    if (collegeData.name_ar && collegeData.name_ar.trim() !== '') {
                        colleges.push(collegeData);
                    }
                });
                $('#collegesInput').val(JSON.stringify(colleges));

                // جمع المعاهد
                let institutes = [];
                $('#institutesList > .border').each(function () {
                    let instituteData = {
                        name_ar: $(this).find('.institute-name').val(),
                        fee: $(this).find('.institute-fee').val() || null,
                        language: $(this).find('.institute-language').val() || null,
                        majors: $(this).find('.institute-majors-list .flex').map(function () {
                            return $(this).data('major-id');
                        }).get()
                    };
                    if (instituteData.name_ar && instituteData.name_ar.trim() !== '') {
                        institutes.push(instituteData);
                    }
                });
                $('#institutesInput').val(JSON.stringify(institutes));
                // جمع البرامج
                let programs = [];
                $('#programsList .program-item').each(function () {
                    const program = {
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

                return true;
            });
        });
    </script>
</body>

</html>