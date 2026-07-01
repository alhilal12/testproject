@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">📢 إدارة الإعلانات</h1>
            <a href="{{ route('admin.announcements.create') }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">
                + إضافة جديد
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-right">#</th>
                        <th class="px-4 py-3 text-right">العنوان</th>
                        <th class="px-4 py-3 text-center">الصورة</th>
                        <th class="px-4 py-3 text-center">الحالة</th>
                        <th class="px-4 py-3 text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($announcements as $index => $announcement)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $index + 1 }}</td>
                            <td class="px-4 py-3">{{ $announcement->title_ar }}</td>
                            <td class="px-4 py-3 text-center">
                                @if($announcement->image)
                                    <img src="{{ asset('storage/' . $announcement->image) }}"
                                        class="w-16 h-10 object-cover rounded">
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="{{ $announcement->is_active ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $announcement->is_active ? '✅ نشط' : '❌ غير نشط' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('admin.announcements.edit', $announcement) }}"
                                    class="text-blue-600 hover:text-blue-800 mx-1">✏️</a>
                                <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST"
                                    class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 mx-1"
                                        onclick="return confirm('هل أنت متأكد من الحذف؟')">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-8 text-gray-500">📭 لا توجد إعلانات حتى الآن</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection