@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <h1 class="text-2xl font-bold mb-6">📢 إضافة إعلان جديد</h1>

        <form action="{{ route('admin.announcements.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-xl shadow-md p-6">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">العنوان (عربي) *</label>
                <input type="text" name="title_ar"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">العنوان (تركي)</label>
                <input type="text" name="title_tr"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">العنوان (إنجليزي)</label>
                <input type="text" name="title_en"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">الوصف (عربي)</label>
                <textarea name="description_ar" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">الوصف (تركي)</label>
                <textarea name="description_tr" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">الوصف (إنجليزي)</label>
                <textarea name="description_en" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">🖼️ الصورة</label>

                <!-- معاينة الصورة (تظهر بعد الاختيار) -->
                <div id="imagePreview" class="hidden mb-3">
                    <img id="previewImg"
                        src="{{ isset($announcement) && $announcement->image ? asset('storage/' . $announcement->image) : '#' }}"
                        alt="معاينة الصورة" class="w-32 h-20 object-cover rounded-lg border-2 border-yellow-300 shadow-sm">
                </div>

                <input type="file" name="image" accept="image/*" onchange="previewImage(event)"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100 transition">

                <p class="text-xs text-gray-400 mt-1">📌 الصيغ المدعومة: JPG, PNG, WEBP (الحد الأقصى 2MB)</p>
            </div>

            @push('scripts')
                <script>
                    function previewImage(event) {
                        const input = event.target;
                        const preview = document.getElementById('imagePreview');
                        const previewImg = document.getElementById('previewImg');

                        if (input.files && input.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                previewImg.src = e.target.result;
                                preview.classList.remove('hidden');
                            }
                            reader.readAsDataURL(input.files[0]);
                        } else {
                            preview.classList.add('hidden');
                        }
                    }
                </script>
            @endpush

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">رابط (اختياري)</label>
                <input type="url" name="link"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500"
                    placeholder="https://example.com">
            </div>

            <div class="mb-4 flex items-center gap-3">
                <input type="checkbox" name="is_active" value="1" checked class="w-5 h-5 text-yellow-500">
                <label class="text-sm font-semibold">نشط</label>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg transition">💾 حفظ</button>
                <a href="{{ route('admin.announcements.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-2 rounded-lg transition">إلغاء</a>
            </div>
        </form>
    </div>
@endsection