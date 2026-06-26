<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مستندات الطلاب - لوحة تحكم المستشار</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <x-navbar />

    <div class="container mx-auto px-4 py-10">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">📄 مستندات الطلاب</h1>
                <p class="text-yellow-100 text-sm">مراجعة وتوثيق مستندات الطلاب المرفوعة</p>
            </div>

            <div class="p-6">
                @if($documents->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b">
                                    <th class="text-right py-3 px-4">الطالب</th>
                                    <th class="text-right py-3 px-4">نوع المستند</th>
                                    <th class="text-right py-3 px-4">اسم الملف</th>
                                    <th class="text-right py-3 px-4">تاريخ الرفع</th>
                                    <th class="text-right py-3 px-4">الحالة</th>
                                    <th class="text-right py-3 px-4">الإجراءات</th>
                                <table>
                            </thead>
                            <tbody>
                                @foreach($documents as $doc)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="py-3 px-4">
                                            <div>
                                                <span class="font-semibold">{{ $doc->user->name }}</span>
                                                <br>
                                                <span class="text-xs text-gray-500">{{ $doc->user->email }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4">
                                            @php
                                                $docTypes = [
                                                    'photo' => 'الصورة الشخصية',
                                                    'passport' => 'جواز السفر',
                                                    'high_school_certificate' => 'شهادة الثانوية',
                                                    'transcript' => 'كشف الدرجات',
                                                    'language_certificate' => 'شهادة اللغة',
                                                    'cv' => 'السيرة الذاتية',
                                                    'motivation_letter' => 'رسالة الدافع',
                                                    'recommendation' => 'خطاب توصية',
                                                ];
                                            @endphp
                                            {{ $docTypes[$doc->type] ?? $doc->type }}
                                        </td>
                                        <td class="py-3 px-4">
                                            <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="text-blue-500 hover:underline">
                                                {{ $doc->original_name }}
                                            </a>
                                         </td>
                                        <td class="py-3 px-4 text-sm">{{ $doc->created_at->format('Y-m-d') }}</td>
                                        <td class="py-3 px-4">
                                            @if($doc->is_verified)
                                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">موثق ✓</span>
                                            @else
                                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">قيد المراجعة</span>
                                            @endif
                                         </td>
                                        <td class="py-3 px-4">
                                            <div class="flex gap-2">
                                                @if(!$doc->is_verified)
                                                    <form action="{{ route('consultant.verify-document', $doc->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded text-sm hover:bg-green-600">
                                                            توثيق
                                                        </button>
                                                    </form>
                                                @endif
                                                <button onclick="deleteDocument({{ $doc->id }})" class="px-3 py-1 bg-red-500 text-white rounded text-sm hover:bg-red-600">
                                                    حذف
                                                </button>
                                            </div>
                                         </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        {{ $documents->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-gray-500">لا توجد مستندات مرفوعة بعد</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>