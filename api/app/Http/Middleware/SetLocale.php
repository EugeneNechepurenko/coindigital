<?php

namespace App\Http\Middleware;

use Closure;
use App\Locale;
use App\Facades\Loc;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Loc::current();
        $desiredLocale = $request->segment(1);
        $locale = Loc::isSupported($desiredLocale) ? $desiredLocale : Loc::fallback();
        
        Loc::set($locale);

        return $next($request);
    }
}