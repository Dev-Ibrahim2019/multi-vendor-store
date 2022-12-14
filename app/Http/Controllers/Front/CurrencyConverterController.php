<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\CurrencyConverter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CurrencyConverterController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'currency_code' => 'required|string|size:3',
        ]);

        $currencyCode = $request->input('currency_code');
        $baseCurrencyCode = config('app.currency');


        $cacheKey = 'currency_rate_' . $currencyCode;
        $rate = Cache::get($cacheKey, 0);
        if (! $rate) {
            // $converter = App::make('currency_converter'); //(Service Container) app service provider 1 ||
            // $converter = app()->make('currency_converter'); // 2 ||
            $converter = app('currency_converter'); // 3
            $rate = $converter->convert($baseCurrencyCode, $currencyCode);

            Cache::put($cacheKey, $rate, now()->addMinutes(60));
        }

        Session::put('currency_code', $currencyCode);

        return redirect()->back();
    }
}



