<?php

namespace App\Providers;

use App\Services\SiteConfigService;
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
        app(SiteConfigService::class)->mergeIntoConfig();

        view()->share('site', config('site'));
    }
}
