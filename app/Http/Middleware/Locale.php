<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('locale')) {
            if (auth()->check()) {
                session()->put('locale', auth()->user()->locale);
            } else {
                $lang = str_replace('_', '-', $request->getPreferredLanguage());
                $lang = str_replace(' ', '-', $lang);
                session()->put('locale', $lang);
            }
        }

        app()->setLocale(session('locale'));
        return $next($request);
    }
}
