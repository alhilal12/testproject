<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم المستشار - الهلال للاستشارات التعليمية</title>
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

        .stat-card {
            transition: all 0.3s ease;
            background: white;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
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

        .tab-active {
            background-color: #eab308;
            color: white;
        }

        .tab-inactive {
            background-color: #f3f4f6;
            color: #4b5563;
        }

        .tab-inactive:hover {
            background-color: #e5e7eb;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    <x-navbar />

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-10 mt-20">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-white mb-2 animate-fadeUp">لوحة تحكم المستشار</h1>
            <p class="text-gray-300 animate-fadeUp" style="animation-delay: 0.1s;">مرحباً {{ Auth::user()->name }}،
                إدارة ومتابعة الاستشارات والرسائل والمستندات</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">

        <!-- إحصائيات سريعة -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8 animate-fadeUp">
            <div class="stat-card rounded-xl shadow-md p-4 text-center border-t-4 border-gray-500">
                <p class="text-2xl font-bold text-gray-800">{{ $stats['total'] }}</p>
                <p class="text-gray-500 text-sm">إجمالي الاستشارات</p>
            </div>
            <div class="stat-card rounded-xl shadow-md p-4 text-center border-t-4 border-yellow-500">
                <p class="text-2xl font-bold text-yellow-600">{{ $stats['pending'] }}</p>
                <p class="text-gray-500 text-sm">في انتظار الرد</p>
            </div>
            <div class="stat-card rounded-xl shadow-md p-4 text-center border-t-4 border-blue-500">
                <p class="text-2xl font-bold text-blue-600">{{ $stats['processing'] }}</p>
                <p class="text-gray-500 text-sm">قيد المعالجة</p>
            </div>
            <div class="stat-card rounded-xl shadow-md p-4 text-center border-t-4 border-green-500">
                <p class="text-2xl font-bold text-green-600">{{ $stats['replied'] }}</p>
                <p class="text-gray-500 text-sm">تم الرد</p>
            </div>
            <div class="stat-card rounded-xl shadow-md p-4 text-center border-t-4 border-purple-500">
                <p class="text-2xl font-bold text-purple-600">{{ $stats['today'] }}</p>
                <p class="text-gray-500 text-sm">اليوم</p>
            </div>
        </div>

        <!-- أزرار سريعة -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8 animate-fadeUp">
            <a href="{{ route('admin.universities.index') }}"
                class="flex items-center justify-center gap-2 p-3 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4 0h1m-1-4h1">
                    </path>
                </svg>
                <span>إدارة الجامعات</span>
            </a>
            <!-- ✅ زر إدارة الإعلانات (جديد) -->
            <a href="{{ route('admin.announcements.index') }}"
                class="flex items-center justify-center gap-2 p-3 bg-white rounded-xl shadow-md hover:shadow-lg transition hover:bg-yellow-50">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
                </svg>
                <span>📢 إدارة الإعلانات</span>
            </a>
            <a href="{{ route('consultant.students-documents') }}"
                class="flex items-center justify-center gap-2 p-3 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <span>مستندات الطلاب</span>
            </a>
            <a href="{{ route('consultant.reports') }}"
                class="flex items-center justify-center gap-2 p-3 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>
                <span>التقارير</span>
            </a>
            <a href="{{ route('consultant.dashboard') }}"
                class="flex items-center justify-center gap-2 p-3 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v16h16V4H4zm2 2h12v12H6V6zm2 2h8v2H8V8zm0 4h8v2H8v-2zm0 4h8v2H8v-2z"></path>
                </svg>
                <span>تحديث</span>
            </a>
            <a href="{{ route('admin.articles.index') }}"
                class="flex items-center justify-center gap-2 p-3 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                    </path>
                </svg>
                <span>📝 إدارة المقالات</span>
            </a>

            <!--  زر إعدادات التواصل (جديد)  -->
            <a href="{{ route('consultant.contact.config') }}"
                class="flex items-center justify-center gap-2 p-3 bg-white rounded-xl shadow-md hover:shadow-lg transition hover:bg-green-50">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>إعدادات التواصل</span>
            </a>
            <!--  نهاية الزر الجديد  -->
        </div>

        <!-- تبويبات الرسائل والاستشارات -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fadeUp">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                <h2 class="text-xl font-bold text-white">الرسائل والاستشارات</h2>
            </div>

            <!-- أزرار التبويبات -->
            <div class="flex border-b border-gray-200">
                <button onclick="showTab('consultations')" id="tabConsultations"
                    class="tab-active px-6 py-3 font-semibold transition">
                    💬 الاستشارات ({{ $consultations->total() }})
                </button>
                <button onclick="showTab('messages')" id="tabMessages"
                    class="tab-inactive px-6 py-3 font-semibold transition">
                    📬 رسائل الاتصال ({{ $contactMessages->total() }})
                </button>
            </div>

            <!-- ===== تبويب الاستشارات ===== -->
            <div id="consultationsTab" class="p-6">
                @if($consultations->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            thead<thead>
                                <tr class="bg-gray-50 border-b">
                                    <th class="text-right py-3 px-4">#</th>
                                    <th class="text-right py-3 px-4">الطالب</th>
                                    <th class="text-right py-3 px-4">الاستشارة</th>
                                    <th class="text-right py-3 px-4">المرفق</th> {{-- عمود جديد --}}
                                    <th class="text-right py-3 px-4">التاريخ</th>
                                    <th class="text-right py-3 px-4">الحالة</th>
                                    <th class="text-right py-3 px-4">إجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($consultations as $consult)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="py-3 px-4">{{ $consult->id }}</td>
                                        <td class="py-3 px-4">{{ $consult->student->name }}</td>
                                        <td class="py-3 px-4 max-w-xs truncate">{{ $consult->message }}</td>
                                        <td class="py-3 px-4">
                                            @if($consult->attachment)
                                                <a href="{{ asset('storage/' . $consult->attachment) }}" target="_blank"
                                                    class="text-blue-500 hover:underline text-sm flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12">
                                                        </path>
                                                    </svg>
                                                    عرض
                                                </a>
                                            @else
                                                <span class="text-gray-400 text-sm">—</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4">{{ $consult->created_at->format('Y/m/d') }}</td>
                                        <td class="py-3 px-4">
                                            <span class="status-badge status-{{ $consult->status }}">
                                                {{ $consult->status_text }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4">
                                            <a href="{{ route('consultant.reply.form', $consult->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm transition">
                                                رد
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        {{ $consultations->links() }}
                    </div>
                @else
                    <div class="text-center py-12 text-gray-500">
                        💬 لا توجد استشارات لعرضها
                    </div>
                @endif
            </div>

            <!-- ===== تبويب رسائل الاتصال ===== -->
            <div id="messagesTab" class="p-6 hidden">
                @if($contactMessages->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b">
                                    <th class="text-right py-3 px-4">#</th>
                                    <th class="text-right py-3 px-4">المرسل</th>
                                    <th class="text-right py-3 px-4">البريد</th>
                                    <th class="text-right py-3 px-4">الرسالة</th>
                                    <th class="text-right py-3 px-4">التاريخ</th>
                                    <th class="text-right py-3 px-4">إجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contactMessages as $message)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="py-3 px-4">{{ $message->id }}</td>
                                        <td class="py-3 px-4">
                                            {{ $message->name }}
                                            @if($message->user_id)
                                                <span class="text-xs text-green-600 bg-green-100 px-1 rounded ml-1">(مسجل)</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4">{{ $message->email }}</td>
                                        <td class="py-3 px-4 max-w-xs truncate">{{ $message->message }}</td>
                                        <td class="py-3 px-4">{{ $message->created_at->format('Y/m/d') }}</td>
                                        <td class="py-3 px-4">
                                            <a href="mailto:{{ $message->email }}"
                                                class="text-blue-600 hover:underline text-sm">رد بالبريد</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        {{ $contactMessages->links() }}
                    </div>
                @else
                    <div class="text-center py-12 text-gray-500">
                        📭 لا توجد رسائل اتصال لعرضها
                    </div>
                @endif
            </div>

        </div>
    </div>

    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} الهلال للاستشارات التعليمية. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <script>
        function showTab(tab) {
            // إخفاء التبويبات
            document.getElementById('consultationsTab').classList.add('hidden');
            document.getElementById('messagesTab').classList.add('hidden');

            // إزالة التمييز عن الأزرار
            document.getElementById('tabConsultations').classList.remove('tab-active');
            document.getElementById('tabConsultations').classList.add('tab-inactive');
            document.getElementById('tabMessages').classList.remove('tab-active');
            document.getElementById('tabMessages').classList.add('tab-inactive');

            // إظهار التبويب المطلوب
            if (tab === 'consultations') {
                document.getElementById('consultationsTab').classList.remove('hidden');
                document.getElementById('tabConsultations').classList.remove('tab-inactive');
                document.getElementById('tabConsultations').classList.add('tab-active');
            } else {
                document.getElementById('messagesTab').classList.remove('hidden');
                document.getElementById('tabMessages').classList.remove('tab-inactive');
                document.getElementById('tabMessages').classList.add('tab-active');
            }
        }
    </script>
</body>

</html>