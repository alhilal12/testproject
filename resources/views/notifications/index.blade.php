<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الإشعارات - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <x-navbar />

    <div class="container mx-auto px-4 py-10 max-w-4xl">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-white">الإشعارات</h1>
                @if($notifications->where('is_read', false)->count() > 0)
                    <form action="{{ route('notifications.mark-all-read') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="text-sm bg-white text-yellow-600 px-3 py-1 rounded-lg hover:bg-yellow-50 transition">
                            تحديث الكل كمقروء
                        </button>
                    </form>
                @endif
            </div>

            <div class="p-6">
                @if($notifications->count() > 0)
                    <div class="space-y-3">
                        @foreach($notifications as $notification)
                            <div class="border rounded-lg p-4 transition hover:shadow-md 
                                                {{ $notification->is_read ? 'bg-white' : 'bg-yellow-50 border-yellow-200' }}">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-{{ $notification->type_color }}-100 flex items-center justify-center flex-shrink-0">
                                        <span
                                            class="text-{{ $notification->type_color }}-600 text-lg">{{ $notification->type_icon }}</span>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-start">
                                            <h3 class="font-bold text-gray-800">{{ $notification->title }}</h3>
                                            <span
                                                class="text-xs text-gray-400">{{ $notification->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-gray-600 text-sm mt-1">{{ $notification->message }}</p>
                                        @if(!$notification->is_read)
                                            <form action="{{ route('notifications.mark-read', $notification->id) }}" method="POST"
                                                class="mt-2">
                                                @csrf
                                                <button type="submit" class="text-xs text-yellow-600 hover:text-yellow-700">
                                                    تحديد كمقروء
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $notifications->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                        <p class="text-gray-500">لا توجد إشعارات</p>
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
</body>

</html>