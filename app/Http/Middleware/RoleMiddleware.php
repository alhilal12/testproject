<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // تحميل علاقة role إذا لم تكن محملة
        if (!$user->relationLoaded('role')) {
            $user->load('role');
        }
        
        // التحقق من صلاحيات المستخدم
        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        abort(403, 'ليس لديك صلاحية للوصول إلى هذه الصفحة');
    }
}