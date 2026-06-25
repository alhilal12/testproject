<button id="darkModeToggle" class="p-2 rounded-lg hover:bg-gray-100 transition">
    <span id="darkModeIcon" class="text-xl">🌙</span>
</button>

<?php $__env->startPush('styles'); ?>
    <style>
        body.dark-mode {
            background-color: #1a202c;
            color: #e2e8f0;
        }

        .dark-mode .bg-white {
            background-color: #2d3748 !important;
        }

        .dark-mode .bg-gray-50 {
            background-color: #1a202c !important;
        }

        .dark-mode .text-gray-800 {
            color: #e2e8f0 !important;
        }

        .dark-mode .text-gray-700 {
            color: #cbd5e0 !important;
        }

        .dark-mode .border-gray-200 {
            border-color: #4a5568 !important;
        }

        .dark-mode .shadow-md {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3) !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('darkModeToggle');
            const icon = document.getElementById('darkModeIcon');

            if (localStorage.getItem('darkMode') === 'true') {
                document.body.classList.add('dark-mode');
                if (icon) icon.textContent = '☀️';
            }

            if (toggle) {
                toggle.addEventListener('click', function () {
                    document.body.classList.toggle('dark-mode');
                    const isDark = document.body.classList.contains('dark-mode');
                    localStorage.setItem('darkMode', isDark);
                    if (icon) icon.textContent = isDark ? '☀️' : '🌙';
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\laragon\www\testProject\resources\views/components/dark-mode-toggle.blade.php ENDPATH**/ ?>