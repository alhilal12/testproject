<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - الهلال للاستشارات التعليمية</title>
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

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }

        .animate-fadeUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .error-shake {
            animation: shake 0.3s ease-in-out;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.25rem;
        }

        .input-group input {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1.5px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #f9fafb;
        }

        .input-group input:focus {
            outline: none;
            border-color: #eab308;
            background: white;
            box-shadow: 0 0 0 3px rgba(234, 179, 8, 0.1);
        }

        .input-group label {
            position: absolute;
            right: 1rem;
            top: 0.8rem;
            color: #9ca3af;
            transition: all 0.3s ease;
            pointer-events: none;
            background: transparent;
            padding: 0 0.25rem;
            font-size: 0.9rem;
        }

        .input-group input:focus~label,
        .input-group input:not(:placeholder-shown)~label {
            top: -0.6rem;
            right: 0.75rem;
            font-size: 0.7rem;
            color: #eab308;
            background: white;
            padding: 0 0.25rem;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-sans">

    <!-- Navbar بسيط -->
    <nav class="bg-white shadow-sm py-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A17.379 17.379 0 007 14.6v-3.1l2 .856v3.117a6.978 6.978 0 00.3.1zM12 14.6c-.787.796-1.748 1.473-2.7 1.973v-3.117l2-.856v3.1zM15 10.12l1.69-.723a1 1 0 01.89.89 11.115 11.115 0 01-.25 3.762 1 1 0 01-.89.89A8.97 8.97 0 0115 14.22v-4.1z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-800">الهلال</span>
                </div>
                <a href="<?php echo e(route('register')); ?>" class="text-gray-600 hover:text-yellow-600 transition">إنشاء حساب</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden animate-fadeUp">

            <!-- Header -->
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-8 py-6 text-center">
                <h1 class="text-2xl font-bold text-white mb-1">مرحباً بعودتك</h1>
                <p class="text-yellow-100 text-sm">سجل دخولك للوصول إلى حسابك</p>
            </div>

            <!-- Form -->
            <div class="p-8">
                <form method="POST" action="<?php echo e(route('login')); ?>" id="loginForm">
                    <?php echo csrf_field(); ?>

                    <!-- البريد الإلكتروني -->
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder=" " value="<?php echo e(old('email')); ?>" required
                            autofocus class="w-full <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <label for="email">البريد الإلكتروني</label>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- كلمة المرور -->
                    <div class="input-group relative">
                        <input type="password" id="password" name="password" placeholder=" " required
                            class="w-full pl-10 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <label for="password">كلمة المرور</label>
                        <button type="button" onclick="togglePassword('password')"
                            class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-yellow-600 transition">
                            <svg id="eyeIcon-password" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </button>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>

                                class="w-4 h-4 rounded border-gray-300 text-yellow-500 focus:ring-yellow-500 cursor-pointer">
                            <span class="text-sm text-gray-600">تذكرني</span>
                        </label>

                        <?php if(Route::has('password.request')): ?>
                            <a href="<?php echo e(route('password.request')); ?>"
                                class="text-sm text-yellow-600 hover:text-yellow-700 hover:underline">
                                نسيت كلمة المرور؟
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-bold py-3 rounded-xl transition-all duration-300 transform hover:scale-[1.02] active:scale-100 shadow-md">
                        تسجيل الدخول
                    </button>
                </form>

                <!-- Divider -->
                <div class="text-center mt-6">
                    <p class="text-gray-500 text-sm">
                        ليس لديك حساب؟
                        <a href="<?php echo e(route('register')); ?>"
                            class="text-yellow-600 hover:text-yellow-700 font-semibold hover:underline">
                            إنشاء حساب جديد
                        </a>
                    </p>
                </div>

                <!-- Demo Credentials (للاختبار فقط - يمكن حذفه لاحقاً) -->
                <div class="mt-6 pt-4 border-t border-gray-200 text-center">
                    <p class="text-xs text-gray-400 mb-2">حساب تجريبي للاختبار:</p>
                    <p class="text-xs text-gray-500">
                        📧 ahmed@example.com<br>
                        🔑 password123
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eyeIcon = document.getElementById('eyeIcon-' + fieldId);

            if (field.type === 'password') {
                field.type = 'text';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>';
            } else {
                field.type = 'password';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        }

        // Error shake effect
        <?php if($errors->any()): ?>
            const errorInputs = document.querySelectorAll('.border-red-500');
            errorInputs.forEach(input => {
                input.classList.add('error-shake');
                setTimeout(() => input.classList.remove('error-shake'), 300);
            });
        <?php endif; ?>

        // Prevent multiple submissions
        const form = document.getElementById('loginForm');
        form.addEventListener('submit', function () {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<div class="inline-block w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin mx-auto"></div>';
        });
    </script>
</body>

</html><?php /**PATH C:\laragon\www\testProject\resources\views/auth/login.blade.php ENDPATH**/ ?>