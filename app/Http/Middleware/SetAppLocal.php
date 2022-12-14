<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class SetAppLocal
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
        // // Using Cookie
        // $locale = request('locale', Cookie::get('locale', config('app.locale')));
        // App::setLocale($locale);
        // Cookie::queue('locale', $locale, 60 * 24 * 365);

        // // Using Session
        // $locale = request('locale', Session::get('locale', config('app.locale')));
        // App::setLocale($locale);
        // Session::put('locale', $locale);

        // Using route --> get the locale from route
        $locale = $request->route('locale');
        App::setLocal($locale);

        // locale default value in URL
        URL::defaults([
            'locale' => $locale,
        ]);

        // forget local parameter, cuse i won't add it to action parameter in controller 
        Route::current()->forgetParameter('locale');

        return $next($request);
    }
}
