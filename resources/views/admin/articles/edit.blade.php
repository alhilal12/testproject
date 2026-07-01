@extends('layouts.admin')

@section('title', 'تعديل المقال')

@section('content')
    <div class="container mx-auto px-4 py-10 max-w-4xl">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">✏️ تعديل المقال: {{ $article->title }}</h1>
            </div>

            <div class="p-6">
                <form action="{{ route('admin.articles.update', $article->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6">
                        <!-- العنوان -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">العنوان *</label>
                            <input type="text" name="title" value="{{ old('title', $article->title) }}" required
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                        </div>

                        <!-- الفئة -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">الفئة *</label>
                            <select name="category" required
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                                <option value="turkey-studies" {{ $article->category == 'turkey-studies' ? 'selected' : '' }}>
                                    🎓 الدراسة في تركيا</option>
                                <option value="exams" {{ $article->category == 'exams' ? 'selected' : '' }}>📝 اختبارات القبول
                                </option>
                                <option value="scholarships" {{ $article->category == 'scholarships' ? 'selected' : '' }}>🏆
                                    المنح الدراسية</option>
                                <option value="certificates" {{ $article->category == 'certificates' ? 'selected' : '' }}>📜
                                    الشهادات</option>
                                <option value="testimonials" {{ $article->category == 'testimonials' ? 'selected' : '' }}>💬
                                    قصص النجاح</option>
                            </select>
                        </div>

                        <!-- الصورة الحالية -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">الصورة الحالية</label>
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" loading="lazy"
                                    class="w-32 h-32 rounded-lg object-cover border mb-2">
                            @else
                                <div
                                    class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 mb-2">
                                    لا توجد صورة</div>
                            @endif
                        </div>

                        <!-- رفع صورة جديدة -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">تغيير الصورة (اختياري)</label>
                            <input type="file" name="image" accept="image/*"
                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg">
                            <p class="text-xs text-gray-400 mt-1">اتركه فارغاً إذا لم ترد تغيير الصورة</p>
                        </div>

                        <!-- النشر -->
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="is_published" id="is_published" value="1" {{ $article->is_published ? 'checked' : '' }} class="w-5 h-5">
                            <label for="is_published" class="text-gray-700 font-semibold">منشور</label>
                        </div>
                    </div>

                    <!-- محتوى المقال -->
                    <div class="mt-6">
                        <label class="block text-gray-700 font-semibold mb-2">المحتوى *</label>

                        <!-- شريط أدوات بسيط -->
                        <div class="border border-gray-200 rounded-t-lg p-2 bg-gray-50 flex gap-2 flex-wrap">
                            <button type="button" onclick="formatText('bold')"
                                class="px-2 py-1 bg-white border rounded hover:bg-gray-100 font-bold"
                                title="عريض">ع</button>
                            <button type="button" onclick="formatText('italic')"
                                class="px-2 py-1 bg-white border rounded hover:bg-gray-100 italic" title="مائل">م</button>
                            <button type="button" onclick="formatText('underline')"
                                class="px-2 py-1 bg-white border rounded hover:bg-gray-100 underline"
                                title="تسطير">س</button>
                            <button type="button" onclick="formatText('heading')"
                                class="px-2 py-1 bg-white border rounded hover:bg-gray-100"
                                title="عنوان رئيسي">عنوان</button>
                            <button type="button" onclick="formatText('subheading')"
                                class="px-2 py-1 bg-white border rounded hover:bg-gray-100" title="عنوان فرعي">عنوان
                                فرعي</button>
                            <button type="button" onclick="formatList('unordered')"
                                class="px-2 py-1 bg-white border rounded hover:bg-gray-100" title="قائمة نقطية">•
                                قائمة</button>
                            <button type="button" onclick="formatList('ordered')"
                                class="px-2 py-1 bg-white border rounded hover:bg-gray-100" title="قائمة رقمية">١
                                قائمة</button>
                            <button type="button" onclick="formatText('link')"
                                class="px-2 py-1 bg-white border rounded hover:bg-gray-100" title="إضافة رابط">🔗
                                رابط</button>
                        </div>

                        <textarea name="content" id="content" rows="15" required
                            class="w-full px-4 py-3 border-x-2 border-b-2 border-gray-200 rounded-b-lg focus:border-yellow-500 focus:outline-none">{{ old('content', $article->content) }}</textarea>

                        <p class="text-xs text-gray-400 mt-1">يمكنك استخدام الأزرار أعلاه لتنسيق النص بسهولة</p>
                    </div>

                    <div class="flex gap-4 mt-8">
                        <button type="submit"
                            class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 rounded-lg transition">
                            حفظ التغييرات
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

    <script>
        function formatText(type) {
            const textarea = document.getElementById('content');
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const selectedText = textarea.value.substring(start, end);
            let formattedText = '';

            switch (type) {
                case 'bold':
                    formattedText = `<strong>${selectedText}</strong>`;
                    break;
                case 'italic':
                    formattedText = `<em>${selectedText}</em>`;
                    break;
                case 'underline':
                    formattedText = `<u>${selectedText}</u>`;
                    break;
                case 'heading':
                    formattedText = `\n<h2>${selectedText || 'عنوان القسم'}</h2>\n`;
                    break;
                case 'subheading':
                    formattedText = `\n<h3>${selectedText || 'عنوان فرعي'}</h3>\n`;
                    break;
                case 'link':
                    const url = prompt('أدخل الرابط:', 'https://');
                    if (url) {
                        formattedText = `<a href="${url}" target="_blank">${selectedText || 'اضغط هنا'}</a>`;
                    }
                    break;
                default:
                    return;
            }

            textarea.value = textarea.value.substring(0, start) + formattedText + textarea.value.substring(end);
            textarea.focus();
        }

        function formatList(type) {
            const textarea = document.getElementById('content');
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const selectedText = textarea.value.substring(start, end);
            let formattedText = '';

            if (type === 'unordered') {
                const lines = selectedText.split('\n');
                formattedText = '<ul>\n' + lines.map(line => `    <li>${line}</li>`).join('\n') + '\n</ul>';
            } else {
                const lines = selectedText.split('\n');
                formattedText = '<ol>\n' + lines.map((line, i) => `    <li>${line}</li>`).join('\n') + '\n</ol>';
            }

            textarea.value = textarea.value.substring(0, start) + formattedText + textarea.value.substring(end);
            textarea.focus();
        }
    </script>
@endsection