@extends('layouts.app')

@section('title', 'إضافة مقال جديد')

@section('content')
    <div class="container mx-auto px-4 py-10 max-w-4xl">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">✏️ كتابة مقال جديد</h1>
            </div>

            <div class="p-6">
                <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- العنوان -->
                        <div class="col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">العنوان *</label>
                            <input type="text" name="title" value="{{ old('title') }}" required
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                        </div>

                        <!-- الفئة -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">الفئة *</label>
                            <select name="category" required
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                                <option value="turkey-studies">🎓 الدراسة في تركيا</option>
                                <option value="exams">📝 اختبارات القبول</option>
                                <option value="scholarships">🏆 المنح الدراسية</option>
                                <option value="certificates">📜 الشهادات</option>
                                <option value="testimonials">💬 قصص النجاح</option>
                            </select>
                        </div>

                        <!-- مستوى الصعوبة -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">المستوى</label>
                            <select name="difficulty"
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                                <option value="beginner">🟢 مبتدئ</option>
                                <option value="intermediate">🟡 متوسط</option>
                                <option value="advanced">🔴 متقدم</option>
                            </select>
                        </div>

                        <!-- مدة القراءة -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">مدة القراءة (دقائق)</label>
                            <input type="number" name="read_time" placeholder="مثال: 5"
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                        </div>

                        <!-- صورة المقال -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">صورة المقال</label>
                            <input type="file" name="image" accept="image/*"
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg">
                        </div>

                        <!-- النشر -->
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="is_published" id="is_published" class="w-5 h-5">
                            <label for="is_published" class="text-gray-700 font-semibold">نشر المقال فوراً</label>
                        </div>
                    </div>

                    <!-- محتوى المقال -->
                    <div class="mt-6">
                        <label class="block text-gray-700 font-semibold mb-2">المحتوى *</label>
                        <textarea name="content" rows="15" required
                            class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none font-mono text-sm">{{ old('content') }}</textarea>
                        <p class="text-xs text-gray-400 mt-1">يمكنك استخدام HTML لتنسيق النص (عناوين، قوائم، صور، روابط)</p>
                    </div>

                    <div class="flex gap-4 mt-8">
                        <button type="submit"
                            class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 rounded-lg transition">
                            حفظ المقال
                        </button>
                        <a href="{{ route('admin.articles.index') }}"
                            class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 rounded-lg text-center transition">
                            إلغاء
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- TinyMCE محرر نصوص متقدم -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea[name="content"]',
            directionality: 'rtl',
            language: 'ar',
            height: 400,
            menubar: true,
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount',
            toolbar: 'undo redo | blocks | bold italic underline | alignright aligncenter alignleft | bullist numlist | link image | code | help',
        });
    </script>
@endsection