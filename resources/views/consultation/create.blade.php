<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب استشارة - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Floating Label Style */
        .floating-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .floating-group input,
        .floating-group select,
        .floating-group textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1.5px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #f9fafb;
        }

        .floating-group input:focus,
        .floating-group select:focus,
        .floating-group textarea:focus {
            outline: none;
            border-color: #eab308;
            background: white;
            box-shadow: 0 0 0 3px rgba(234, 179, 8, 0.1);
        }

        .floating-group label {
            position: absolute;
            right: 1rem;
            top: 0.8rem;
            color: #9ca3af;
            transition: all 0.3s ease;
            pointer-events: none;
            background: transparent;
            padding: 0 0.25rem;
            font-size: 0.9rem;
        }

        /* حالة التركيز أو وجود قيمة */
        .floating-group input:focus~label,
        .floating-group input:not(:placeholder-shown)~label,
        .floating-group textarea:focus~label,
        .floating-group textarea:not(:placeholder-shown)~label,
        .floating-group select:focus~label,
        .floating-group select[data-filled="true"]~label {
            top: -0.6rem;
            right: 0.75rem;
            font-size: 0.7rem;
            color: #eab308;
            background: white;
            padding: 0 0.25rem;
        }

        /* تغيير لون border عند التحديد */
        .floating-group select[data-filled="true"] {
            border-color: #eab308;
            background-color: white;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-sans">

    <x-navbar />

    <div class="min-h-screen py-12 px-4">
        <div class="max-w-3xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-8 animate-fadeUp">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">طلب استشارة تعليمية</h1>
                <p class="text-gray-500">اطرح سؤالك أو اختر تفاصيل أكثر لنساعدك بشكل أفضل</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fadeUp">
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white">نموذج الاستشارة</h2>
                </div>

                <form action="{{ route('consultation.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-6">
                    @csrf

                    <!-- سؤال المستخدم -->
                    <div class="floating-group">
                        <textarea id="message" name="message" rows="4" placeholder=" "
                            required>{{ old('message') }}</textarea>
                        <label for="message">سؤالك *</label>
                    </div>

                    <div class="border-t border-gray-200 my-6 pt-4">
                        <p class="text-sm text-gray-400 mb-4 text-center">معلومات إضافية (اختيارية)</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- الجامعة (اختياري) -->
                        <div class="floating-group">
                            <select id="university_id" name="university_id" data-filled="false">
                                <option value=""> </option>
                                @foreach($universities as $university)
                                    <option value="{{ $university->id }}" {{ old('university_id') == $university->id ? 'selected' : '' }}>
                                        {{ $university->name_ar }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="university_id">الجامعة (اختياري)</label>
                        </div>

                        <!-- التخصص (اختياري) -->
                        <div class="floating-group">
                            <select id="major_id" name="major_id" data-filled="false">
                                <option value=""> </option>
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                                        {{ $major->name_ar }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="major_id">التخصص (اختياري)</label>
                        </div>

                        <!-- المستوى الدراسي (اختياري) -->
                        <div class="floating-group">
                            <select id="education_level" name="education_level" data-filled="false">
                                <option value=""> </option>
                                <option value="bachelor" {{ old('education_level') == 'bachelor' ? 'selected' : '' }}>
                                    بكالوريوس</option>
                                <option value="master" {{ old('education_level') == 'master' ? 'selected' : '' }}>ماجستير
                                </option>
                                <option value="phd" {{ old('education_level') == 'phd' ? 'selected' : '' }}>دكتوراه
                                </option>
                            </select>
                            <label for="education_level">المستوى الدراسي (اختياري)</label>
                        </div>

                        <!-- لغة الدراسة (اختياري) -->
                        <div class="floating-group">
                            <select id="study_language" name="study_language" data-filled="false">
                                <option value=""> </option>
                                <option value="turkish" {{ old('study_language') == 'turkish' ? 'selected' : '' }}>تركي
                                </option>
                                <option value="english" {{ old('study_language') == 'english' ? 'selected' : '' }}>إنجليزي
                                </option>
                                <option value="arabic" {{ old('study_language') == 'arabic' ? 'selected' : '' }}>عربي
                                </option>
                            </select>
                            <label for="study_language">لغة الدراسة (اختياري)</label>
                        </div>
                    </div>

                    <!-- رفع ملف (اختياري) -->
                    <div class="mb-6 mt-4">
                        <label class="block text-gray-700 font-semibold mb-2">رفع مستند (اختياري)</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-yellow-500 transition cursor-pointer"
                            id="uploadArea">
                            <input type="file" name="attachment" id="attachment" class="hidden"
                                accept=".pdf,.doc,.docx,.jpg,.png">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p class="text-gray-500 text-sm">اضغط لرفع ملف أو اسحبه إلى هنا</p>
                            <p class="text-gray-400 text-xs mt-1">PDF, DOC, DOCX, JPG, PNG (حد أقصى 5MB)</p>
                        </div>
                        <div id="fileName" class="text-sm text-green-600 mt-2 hidden"></div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-bold py-3 rounded-xl transition duration-300 transform hover:scale-[1.02] shadow-md">
                        إرسال طلب الاستشارة
                    </button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} الهلال للاستشارات التعليمية. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <script>
        // File upload handling
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('attachment');
        const fileName = document.getElementById('fileName');

        uploadArea.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                fileName.textContent = '📎 ' + this.files[0].name;
                fileName.classList.remove('hidden');
                uploadArea.classList.add('border-yellow-500', 'bg-yellow-50');
            } else {
                fileName.classList.add('hidden');
                uploadArea.classList.remove('border-yellow-500', 'bg-yellow-50');
            }
        });

        // Floating Label for Select Elements
        document.querySelectorAll('select').forEach(select => {
            const updateSelectState = () => {
                const hasValue = select.value !== '';
                select.setAttribute('data-filled', hasValue);
            };

            // Initial state
            updateSelectState();

            // Update on change
            select.addEventListener('change', updateSelectState);
        });
    </script>
</body>

</html>