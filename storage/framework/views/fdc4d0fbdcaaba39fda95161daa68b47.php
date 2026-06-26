<?php
    $whatsappNumber = \App\Models\Setting::get('whatsapp_number');
    // تنظيف الرقم: حذف + و 00 من البداية
    $cleanNumber = preg_replace('/^(00|\+)/', '', $whatsappNumber);
    $whatsappLink = $whatsappNumber ? 'https://wa.me/' . $cleanNumber . '?text=مرحباً،%20أحتاج%20إلى%20استشارة%20بخصوص%20الجامعات%20التركية' : '#';
?>

<?php if($whatsappNumber): ?>
    <a href="<?php echo e($whatsappLink); ?>" target="_blank" class="fixed bottom-8 left-8 z-50 group">
        <div class="relative">
            <div class="absolute inset-0 bg-green-500 rounded-full animate-ping opacity-75"></div>
            <div
                class="relative bg-green-500 rounded-full p-3 shadow-lg hover:bg-green-600 transition-all duration-300 transform hover:scale-110">
                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.669.15-.198.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.019-.458.13-.606.134-.133.298-.347.447-.52.149-.174.198-.298.298-.496.099-.198.05-.372-.025-.521-.075-.149-.669-1.614-.916-2.21-.242-.579-.487-.5-.669-.51-.173-.01-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.478 0 1.462 1.065 2.874 1.213 3.074.149.198 2.095 3.2 5.075 4.486.71.307 1.264.49 1.696.627.713.226 1.362.194 1.876.118.572-.085 1.758-.719 2.006-1.413.248-.694.248-1.288.173-1.413-.074-.124-.272-.198-.57-.347z" />
                </svg>
            </div>
        </div>
        <span
            class="absolute -top-8 -right-2 bg-gray-800 text-white text-xs px-2 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
            تواصل معنا مباشرة
        </span>
    </a>
<?php endif; ?>

<style>
    @keyframes ping {

        75%,
        100% {
            transform: scale(1.5);
            opacity: 0;
        }
    }

    .animate-ping {
        animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
    }
</style><?php /**PATH C:\laragon\www\testProject\resources\views/components/floating-whatsapp.blade.php ENDPATH**/ ?>