<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرد على الاستشارة #{{ $consultation->id }} - الهلال للاستشارات التعليمية</title>
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

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fadeUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .animate-slideRight {
            animation: slideInRight 0.5s ease-out forwards;
        }

        .message-bubble {
            border-radius: 1rem;
            transition: all 0.3s ease;
        }

        .message-bubble:hover {
            transform: translateX(-5px);
            box-shadow: 0 5px 15px -5px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #d97706;
        }

        .status-processing {
            background-color: #dbeafe;
            color: #2563eb;
        }

        .status-replied {
            background-color: #d1fae5;
            color: #059669;
        }

        .status-completed {
            background-color: #e5e7eb;
            color: #4b5563;
        }

        .quick-reply-btn {
            transition: all 0.2s ease;
        }

        .quick-reply-btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    <x-navbar />

    <div class="min-h-screen py-8 px-4">
        <div class="max-w-5xl mx-auto">

            <!-- رجوع -->
            <div class="mb-4 animate-fadeUp">
                <a href="{{ route('consultant.dashboard') }}"
                    class="text-yellow-600 hover:text-yellow-700 inline-flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                    رجوع إلى لوحة التحكم
                </a>
            </div>

            <!-- بطاقة معلومات الاستشارة -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-6 animate-fadeUp">
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-white">استشارة #{{ $consultation->id }}</h2>
                    <span class="status-badge status-{{ $consultation->status }}">
                        {{ $consultation->status_text }}
                    </span>
                </div>
                <div class="p-6">
                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- معلومات الطالب -->
                        <div class="md:w-1/3 bg-gray-50 rounded-xl p-4">
                            <h3 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                معلومات الطالب
                            </h3>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between"><span class="text-gray-500">الاسم:</span><span
                                        class="font-semibold">{{ $consultation->student->name }}</span></div>
                                <div class="flex justify-between"><span
                                        class="text-gray-500">البريد:</span><span>{{ $consultation->student->email }}</span>
                                </div>
                                @if($consultation->student->studentProfile)
                                    <div class="flex justify-between"><span class="text-gray-500">الهاتف:</span><span
                                            dir="ltr">{{ $consultation->student->studentProfile->phone ?? '—' }}</span>
                                    </div>
                                @endif
                                <div class="flex justify-between"><span class="text-gray-500">تاريخ
                                        الاستشارة:</span><span>{{ $consultation->created_at->format('Y/m/d H:i') }}</span>
                                </div>
                            </div>
                            @if($consultation->student->studentProfile?->phone)
                                <a href="https://wa.me/{{ $consultation->student->studentProfile->phone }}" target="_blank"
                                    class="mt-4 flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg transition">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.669.15-.198.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.019-.458.13-.606.134-.133.298-.347.447-.52.149-.174.198-.298.298-.496.099-.198.05-.372-.025-.521-.075-.149-.669-1.614-.916-2.21-.242-.579-.487-.5-.669-.51-.173-.01-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.478 0 1.462 1.065 2.874 1.213 3.074.149.198 2.095 3.2 5.075 4.486.71.307 1.264.49 1.696.627.713.226 1.362.194 1.876.118.572-.085 1.758-.719 2.006-1.413.248-.694.248-1.288.173-1.413-.074-.124-.272-.198-.57-.347z" />
                                    </svg>
                                    التواصل عبر واتس اب
                                </a>
                            @endif
                        </div>
                        <!-- سؤال الطالب -->
                        <!-- سؤال الطالب -->
                        <div class="md:w-2/3">
                            <h3 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                    </path>
                                </svg>
                                سؤال الطالب
                            </h3>
                            <div class="bg-yellow-50 rounded-xl p-4 border-r-4 border-yellow-500">
                                <p class="text-gray-700 leading-relaxed mb-3">{{ $consultation->message }}</p>

                                {{-- عرض المستند المرفق --}}
                                @if($consultation->attachment)
                                    <div class="mt-3 pt-3 border-t border-yellow-200">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                                </path>
                                            </svg>
                                            <span class="text-sm text-gray-600">المستند المرفق:</span>
                                            <a href="{{ asset('storage/' . $consultation->attachment) }}" target="_blank"
                                                class="text-blue-600 hover:underline text-sm">
                                                {{ basename($consultation->attachment) }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if($consultation->university || $consultation->major)
                                    <div class="mt-3 pt-3 border-t border-yellow-200 flex gap-3 text-sm text-gray-500">
                                        @if($consultation->university)<span>🏛️
                                        {{ $consultation->university->name_ar }}</span>@endif
                                        @if($consultation->major)<span>📚 {{ $consultation->major->name_ar }}</span>@endif
                                        @if($consultation->education_level)<span>🎓
                                        {{ $consultation->education_level == 'bachelor' ? 'بكالوريوس' : ($consultation->education_level == 'master' ? 'ماجستير' : 'دكتوراه') }}</span>@endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- الردود السابقة -->
            @if($consultation->admin_reply)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-6 animate-slideRight">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
                        <h2 class="text-xl font-bold text-white">الردود السابقة</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="message-bubble bg-green-50 rounded-xl p-4 border-r-4 border-green-500">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="font-bold text-green-700">رد المستشار</span>
                                    <span
                                        class="text-xs text-gray-400">{{ $consultation->updated_at->format('Y/m/d H:i') }}</span>
                                </div>
                                <p class="text-gray-700">{{ $consultation->admin_reply }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- نموذج الرد -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fadeUp">
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white">كتابة رد جديد</h2>
                </div>
                <div class="p-6">
                    <!-- ردود سريعة -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">ردود سريعة</label>
                        <div class="flex flex-wrap gap-2">
                            <button
                                onclick="insertQuickReply('شكراً لتواصلك معنا. سيتم دراسة طلبك والتواصل معك قريباً.')"
                                class="quick-reply-btn bg-gray-100 hover:bg-yellow-100 text-gray-700 px-3 py-1 rounded-full text-sm transition">رد
                                عام</button>
                            <button
                                onclick="insertQuickReply('نعم، هذه الجامعة متاحة للتقديم. يمكنك التقديم من خلال موقعنا.')"
                                class="quick-reply-btn bg-gray-100 hover:bg-yellow-100 text-gray-700 px-3 py-1 rounded-full text-sm transition">جامعة
                                متاحة</button>
                            <button
                                onclick="insertQuickReply('عذراً، هذه الجامعة لا تقدم هذا التخصص حالياً. هل تريد الاطلاع على تخصصات أخرى؟')"
                                class="quick-reply-btn bg-gray-100 hover:bg-yellow-100 text-gray-700 px-3 py-1 rounded-full text-sm transition">تخصص
                                غير متوفر</button>
                            <button
                                onclick="insertQuickReply('سيتم التواصل معك هاتفياً لتقديم استشارة شاملة حول هذا الموضوع.')"
                                class="quick-reply-btn bg-gray-100 hover:bg-yellow-100 text-gray-700 px-3 py-1 rounded-full text-sm transition">طلب
                                تواصل هاتفي</button>
                        </div>
                    </div>

                    <form id="replyForm" method="POST" action="{{ route('consultant.reply', $consultation->id) }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">الرد</label>
                            <textarea id="replyMessage" name="reply_message" rows="6"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:outline-none transition"
                                placeholder="اكتب ردك هنا...">{{ old('reply_message') }}</textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">تحديث الحالة</label>
                                <select name="status"
                                    class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-yellow-500 focus:outline-none">
                                    <option value="processing" {{ $consultation->status == 'processing' ? 'selected' : '' }}>🔄 قيد المعالجة</option>
                                    <option value="replied" {{ $consultation->status == 'replied' ? 'selected' : '' }}>✅
                                        تم الرد</option>
                                    <option value="completed" {{ $consultation->status == 'completed' ? 'selected' : '' }}>📌 مكتمل</option>
                                </select>
                            </div>
                            <div class="flex items-end">
                                <button type="button" onclick="sendAndComplete()"
                                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 rounded-lg transition">
                                    إرسال الرد وإنهاء الاستشارة
                                </button>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <button type="submit"
                                class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 rounded-xl transition transform hover:scale-[1.02] shadow-md">
                                إرسال الرد
                            </button>
                            <a href="{{ route('consultant.dashboard') }}"
                                class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 rounded-xl text-center transition">
                                إلغاء
                            </a>
                        </div>
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

    <script>
        function insertQuickReply(text) {
            const textarea = document.getElementById('replyMessage');
            const currentText = textarea.value;
            textarea.value = currentText ? currentText + '\n\n' + text : text;
            textarea.focus();
        }

        function sendAndComplete() {
            document.getElementById('replyMessage').value = document.getElementById('replyMessage').value || 'تم الرد على الاستشارة وإغلاقها.';
            const statusSelect = document.querySelector('select[name="status"]');
            statusSelect.value = 'completed';
            document.getElementById('replyForm').submit();
        }
    </script>
</body>

</html>