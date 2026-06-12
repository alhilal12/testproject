<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="ترتيب الجامعات التركية حسب التصنيف المحلي والعالمي. تعرف على أفضل الجامعات في تركيا لعام {{ date('Y') }}">
    <meta name="keywords"
        content="ترتيب الجامعات التركية, أفضل الجامعات في تركيا, تصنيف الجامعات التركية, ترتيب الجامعات محليا">
    <meta property="og:title" content="ترتيب الجامعات التركية | الهلال للاستشارات التعليمية">
    <meta property="og:description" content="قائمة بأفضل الجامعات التركية حسب الترتيب المحلي والعالمي">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <title>ترتيب الجامعات التركية | الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f9fafb;
        }

        .table-header {
            background: linear-gradient(135deg, #1e3a5f 0%, #0f2b44 100%);
        }
    </style>
</head>

<body>

    <x-navbar />

    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">📊 ترتيب الجامعات التركية</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">قائمة بأفضل الجامعات التركية حسب التصنيف المحلي</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-right border-collapse">
                    <thead>
                        <tr class="table-header text-white">
                            <th class="px-4 py-3 text-center w-24">الترتيب</th>
                            <th class="px-4 py-3 text-right">اسم الجامعة</th>
                            <th class="px-4 py-3 text-right">اسم الجامعة (تركي)</th>
                            <th class="px-4 py-3 text-center">المدينة</th>
                            <th class="px-4 py-3 text-center">النوع</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($universities as $index => $university)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="px-4 py-3 text-center font-bold">
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                        {{ $university->rank_local }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 font-semibold text-gray-800">
                                    <a href="{{ route('universities.show', $university->id) }}"
                                        class="hover:text-yellow-600 transition">
                                        {{ $university->name_ar }}
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-gray-600">{{ $university->name_tr }}</td>
                                <td class="px-4 py-3 text-center">{{ $university->city }}</td>
                                <td class="px-4 py-3 text-center">
                                    @if($university->type == 'public')
                                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">🏢
                                            حكومية</span>
                                    @else
                                        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs">🏛️ خاصة</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-16 text-gray-500">
                                    <div class="text-lg">📭 لا توجد بيانات ترتيب متاحة حالياً</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-floating-whatsapp />
</body>

</html>