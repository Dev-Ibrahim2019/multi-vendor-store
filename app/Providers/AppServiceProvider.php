<?php

namespace App\Providers;

use App\Services\CurrencyConverter;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('currency_converter', function() {
            return new CurrencyConverter(config('services.currency_converter.api_key'));
        });

        JsonResource::withoutWrapping();

        Validator::extend('filter', function ($attribute, $value, $params) {
            return ! in_array(strtolower($value), $params);
        }, 'This value is prohibited!');

        Paginator::useBootstrapFour();
        // Paginator::defaultView('pagination.custom');
    }
}
