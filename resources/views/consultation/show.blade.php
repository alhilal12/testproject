<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل الاستشارة - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <x-navbar />

    <div class="container mx-auto px-4 py-10 max-w-4xl">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">تفاصيل الاستشارة #{{ $consultation->id }}</h1>
            </div>

            <div class="p-6">
                <!-- معلومات الاستشارة -->
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">معلومات الاستشارة</h2>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div><span class="text-gray-500">التاريخ:</span> <span
                                    class="font-semibold">{{ $consultation->created_at->format('Y/m/d H:i') }}</span>
                            </div>
                            <div><span class="text-gray-500">الحالة:</span>
                                <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                    {{ $consultation->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                    {{ $consultation->status == 'processing' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $consultation->status == 'replied' ? 'bg-green-100 text-green-700' : '' }}
                                    {{ $consultation->status == 'completed' ? 'bg-gray-100 text-gray-700' : '' }}">
                                    {{ $consultation->status == 'pending' ? 'قيد الانتظار' : ($consultation->status == 'processing' ? 'قيد المعالجة' : ($consultation->status == 'replied' ? 'تم الرد' : 'مكتمل')) }}
                                </span>
                            </div>
                        </div>
                        @if($consultation->university)
                            <div class="mb-2"><span class="text-gray-500">الجامعة:</span> <span
                                    class="font-semibold">{{ $consultation->university->name_ar }}</span></div>
                        @endif
                        @if($consultation->major)
                            <div><span class="text-gray-500">التخصص:</span> <span
                                    class="font-semibold">{{ $consultation->major->name_ar }}</span></div>
                        @endif
                    </div>
                </div>

                <!-- سؤال الطالب -->
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">سؤالك</h2>
                    <div class="bg-yellow-50 rounded-xl p-4 border-r-4 border-yellow-500">
                        <p class="text-gray-700 leading-relaxed">{{ $consultation->message }}</p>
                    </div>
                </div>

                <!-- رد المستشار -->
                @if($consultation->admin_reply)
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">رد المستشار</h2>
                        <div class="bg-green-50 rounded-xl p-4 border-r-4 border-green-500">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-semibold text-green-700">رد من فريق الدعم</span>
                                <span
                                    class="text-xs text-gray-400">{{ $consultation->replied_at ? \Carbon\Carbon::parse($consultation->replied_at)->format('Y/m/d H:i') : '' }}</span>
                            </div>
                            <p class="text-gray-700 leading-relaxed">{{ $consultation->admin_reply }}</p>
                        </div>
                    </div>
                @endif

                <!-- أزرار الإجراءات -->
                <div class="flex gap-4 mt-6">
                    <a href="{{ route('consultation.my') }}"
                        class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 rounded-xl text-center transition">
                        رجوع إلى الطلبات
                    </a>
                    @if($consultation->status != 'completed')
                        <a href="{{ route('consultation.create') }}"
                            class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 rounded-xl text-center transition">
                            استشارة جديدة
                        </a>
                    @endif
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