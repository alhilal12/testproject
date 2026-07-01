<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مستنداتي - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <x-navbar />

    <div class="container mx-auto px-4 py-10 max-w-5xl">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">📄 مستنداتي</h1>
                <p class="text-yellow-100 text-sm">رفع وإدارة المستندات المطلوبة للتقديم على الجامعات</p>
            </div>

            <div class="p-6">
                <!-- المستندات المطلوبة -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @php
                        $docTypes = [
                            'photo' => ['name' => 'الصورة الشخصية', 'icon' => '🖼️', 'required' => true],
                            'passport' => ['name' => 'جواز السفر', 'icon' => '📘', 'required' => true],
                            'high_school_certificate' => ['name' => 'شهادة الثانوية العامة', 'icon' => '🎓', 'required' => true],
                            'transcript' => ['name' => 'كشف الدرجات', 'icon' => '📊', 'required' => true],
                            'language_certificate' => ['name' => 'شهادة اللغة (TOEFL/IELTS/YÖS)', 'icon' => '🌐', 'required' => false],
                            'cv' => ['name' => 'السيرة الذاتية (CV)', 'icon' => '📄', 'required' => false],
                            'motivation_letter' => ['name' => 'رسالة الدافع', 'icon' => '✉️', 'required' => false],
                            'recommendation' => ['name' => 'خطابات التوصية', 'icon' => '📝', 'required' => false],
                        ];
                    @endphp

                    @foreach($docTypes as $key => $doc)
                        @php
                            $existingDoc = $documents->where('type', $key)->first();
                        @endphp
                        <div class="border rounded-xl p-4 hover:shadow-md transition">
                            <div class="flex justify-between items-start">
                                <div>
                                    <div class="text-3xl mb-2">{{ $doc['icon'] }}</div>
                                    <h3 class="font-bold text-gray-800">{{ $doc['name'] }}</h3>
                                    @if($doc['required'])
                                        <span class="text-xs text-red-500">مطلوب</span>
                                    @else
                                        <span class="text-xs text-gray-400">اختياري</span>
                                    @endif
                                </div>
                                @if($existingDoc)
                                    <div class="text-right">
                                        <span class="text-green-600 text-sm">✓ مرفوع</span>
                                        <button onclick="deleteDocument({{ $existingDoc->id }})" class="block text-red-500 text-xs mt-1">حذف</button>
                                    </div>
                                @else
                                    <button onclick="uploadDocument('{{ $key }}')" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm transition">
                                        رفع الملف
                                    </button>
                                @endif
                            </div>
                            @if($existingDoc)
                                <div class="mt-3 pt-3 border-t border-gray-100">
                                    <a href="{{ asset('storage/' . $existingDoc->file_path) }}" target="_blank" class="text-blue-500 text-sm hover:underline">
                                        عرض الملف المرفوع
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- ملاحظات -->
                <div class="mt-8 bg-yellow-50 rounded-xl p-4 border-r-4 border-yellow-500">
                    <h3 class="font-bold text-yellow-800 mb-2">📌 ملاحظات هامة</h3>
                    <ul class="text-sm text-yellow-700 space-y-1">
                        <li>✓ الصيغ المدعومة: PDF, JPG, JPEG, PNG, DOC, DOCX</li>
                        <li>✓ الحد الأقصى لحجم الملف: 5MB</li>
                        <li>✓ يفضل ترجمة المستندات غير العربية إلى الإنجليزية أو التركية</li>
                        <li>✓ يمكنك رفع أكثر من مستند لنفس النوع (للشهادات المتعددة)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal رفع الملف -->
    <div id="uploadModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl w-full max-w-md mx-4 p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4" id="modalTitle">رفع الملف</h3>
            <form id="uploadForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="docType" name="type">
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">اختر الملف</label>
                    <input type="file" name="file" id="fileInput" required class="w-full p-2 border rounded-lg">
                </div>
                <div class="flex gap-4">
                    <button type="submit" class="flex-1 bg-yellow-500 text-white py-2 rounded-lg">رفع</button>
                    <button type="button" onclick="closeModal()" class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg">إلغاء</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} الهلال للاستشارات التعليمية. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <script>
        let currentType = '';

        function uploadDocument(type) {
            currentType = type;
            document.getElementById('docType').value = type;
            document.getElementById('modalTitle').innerText = 'رفع ' + document.querySelector(`[onclick="uploadDocument('${type}')"]`).closest('.border').querySelector('h3').innerText;
            document.getElementById('uploadModal').classList.remove('hidden');
            document.getElementById('uploadModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('uploadModal').classList.add('hidden');
            document.getElementById('uploadModal').classList.remove('flex');
        }

        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            fetch('{{ route("documents.upload") }}', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: formData
            }).then(response => response.json()).then(data => {
                alert(data.message);
                location.reload();
            });
        });

        function deleteDocument(id) {
            if (confirm('هل أنت متأكد من حذف هذا المستند؟')) {
                fetch('/my-documents/' + id, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                }).then(response => response.json()).then(data => {
                    alert(data.message);
                    location.reload();
                });
            }
        }
    </script>
</body>
</html>