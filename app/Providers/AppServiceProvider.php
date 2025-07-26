<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // // Set default locale for Carbon
        Carbon::setLocale('vi');

        // set secure URL if FORCE_HTTPS is true
        if (env('FORCE_HTTPS', true)) {
            URL::forceScheme('https');
        }
    }
}
