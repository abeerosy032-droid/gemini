<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureDashboardAccess
{
    /**
     * منع الوصول للوحة التحكم بدون تسجيل دخول
     * أو بدون صلاحية مناسبة
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()) {
            return redirect()->route('login')
                ->with('error', 'يجب تسجيل الدخول للوصول للوحة التحكم');
        }

        if (!$request->user()->can('access-dashboard')) {
            abort(403, 'ليس لديك صلاحية الوصول للوحة التحكم');
        }

        return $next($request);
    }
}
