@extends('layouts.admin')

@section('title', 'الدول المعترف بها - ' . $university->name_ar)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-white">🌍 الدول المعترف بها: {{ $university->name_ar }}</h1>
                <a href="{{ route('admin.universities.edit', $university->id) }}"
                    class="bg-white text-yellow-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                    ← رجوع للجامعة
                </a>
            </div>

            <div class="p-6">
                <!-- نموذج إضافة دولة -->
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <h2 class="text-lg font-bold mb-4">➕ إضافة دولة معترف بها</h2>
                    <form action="{{ route('admin.universities.recognitions.store', $university->id) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-semibold mb-1">رمز الدولة *</label>
                                <input type="text" name="country_code" placeholder="مثال: SA, EG, TR"
                                    class="w-full px-3 py-2 border rounded-lg" required maxlength="3">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1">اسم الدولة (عربي) *</label>
                                <input type="text" name="country_name_ar" placeholder="مثال: السعودية"
                                    class="w-full px-3 py-2 border rounded-lg" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1">اسم الدولة (إنجليزي)</label>
                                <input type="text" name="country_name_en" placeholder="مثال: Saudi Arabia"
                                    class="w-full px-3 py-2 border rounded-lg">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold mb-1">ملاحظات</label>
                                <input type="text" name="notes" placeholder="معلومات إضافية عن الاعتراف"
                                    class="w-full px-3 py-2 border rounded-lg">
                            </div>
                            <div class="flex items-end">
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4">
                                    <span class="text-sm">نشط</span>
                                </label>
                                <button type="submit"
                                    class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 mr-4">
                                    إضافة
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- قائمة الدول المعترف بها -->
                <h2 class="text-lg font-bold mb-4">📋 الدول المعترف بها حالياً</h2>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-right">رمز الدولة</th>
                                <th class="px-4 py-2 text-right">الدولة (عربي)</th>
                                <th class="px-4 py-2 text-right">الدولة (إنجليزي)</th>
                                <th class="px-4 py-2 text-right">ملاحظات</th>
                                <th class="px-4 py-2 text-center">الحالة</th>
                                <th class="px-4 py-2 text-center">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($university->recognitions as $recognition)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $recognition->country_code }}</td>
                                    <td class="px-4 py-2">{{ $recognition->country_name_ar }}</td>
                                    <td class="px-4 py-2">{{ $recognition->country_name_en ?? '—' }}</td>
                                    <td class="px-4 py-2">{{ $recognition->notes ?? '—' }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <span
                                            class="px-2 py-1 rounded-full text-xs {{ $recognition->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                            {{ $recognition->is_active ? 'نشط' : 'غير نشط' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <form
                                            action="{{ route('admin.universities.recognitions.destroy', [$university->id, $recognition->id]) }}"
                                            method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">🗑️ حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-gray-500">
                                        لا توجد دول معترف بها مسجلة لهذه الجامعة
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection