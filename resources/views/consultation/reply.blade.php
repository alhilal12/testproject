<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرد على الاستشارة - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        .message-bubble {
            border-radius: 1rem;
            transition: all 0.3s ease;
        }
        .message-bubble:hover {
            transform: translateX(-5px);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <x-navbar />

    <div class="min-h-screen py-12 px-4">
        <div class="max-w-4xl mx-auto">
            
            <div class="mb-6 animate-fadeUp">
                <a href="{{ route('consultant.dashboard') }}" class="text-yellow-600 hover:text-yellow-700 inline-flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                    رجوع إلى لوحة التحكم
                </a>
            </div>

            <!-- Student Message Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fadeUp mb-6">
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white">رسالة من الطالب</h2>
                </div>
                <div class="p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-yellow-600 font-bold text-lg">
                                {{ mb_substr($consultation->student->name, 0, 1) }}
                            </span>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="font-bold text-gray-800">{{ $consultation->student->name }}</h3>
                                <span class="text-gray-400 text-sm">{{ $consultation->created_at->format('Y/m/d H:i') }}</span>
                            </div>
                            <p class="text-gray-700 leading-relaxed">{{ $consultation->message }}</p>
                            
                            @if($consultation->university || $consultation->major)
                                <div class="mt-3 flex flex-wrap gap-3 text-sm text-gray-500">
                                    @if($consultation->university)
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4 0h1m-1-4h1"></path>
                                            </svg>
                                            {{ $consultation->university->name_ar }}
                                        </span>
                                    @endif
                                    @if($consultation->major)
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                            {{ $consultation->major->name_ar }}
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reply Form Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fadeUp">
                <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white">كتابة الرد</h2>
                </div>
                <div class="p-6">
                    <form action="{{ route('consultant.reply', $consultation->id) }}" method="POST">
                        @csrf
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">الرد على الاستشارة</label>
                            <textarea name="reply_message" rows="6" 
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:outline-none transition"
                                      placeholder="اكتب ردك هنا...">{{ old('reply_message') }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">تحديث الحالة</label>
                                <select name="status" class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                                    <option value="processing" {{ $consultation->status == 'processing' ? 'selected' : '' }}>قيد المعالجة</option>
                                    <option value="replied" {{ $consultation->status == 'replied' ? 'selected' : '' }}>تم الرد</option>
                                    <option value="completed" {{ $consultation->status == 'completed' ? 'selected' : '' }}>مكتمل</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold py-3 rounded-xl transition duration-300 transform hover:scale-[1.02] shadow-md">
                            إرسال الرد
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} الهلال للاستشارات التعليمية. جميع الحقوق محفوظة.</p>
        </div>
    </footer>
</body>
</html>