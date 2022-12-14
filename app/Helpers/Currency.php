<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use NumberFormatter;

class Currency
{

    public static function format($amount, $currency = null) {

        $baseCurrecy = config('app.currency', 'USD');

        $formatter = new NumberFormatter(config('app.local'), NumberFormatter::CURRENCY);
        if ($currency === null ){
            $currency = session('currency_code', $baseCurrecy);
        }

        if ($currency != $baseCurrecy) {
            $rate = Cache::get('currency_rate_'.$currency, 1);
            $amount = $amount * $rate;
        }
        return $formatter->formatCurrency($amount, $currency);
    }
}
