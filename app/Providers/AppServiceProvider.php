<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CurlServiceInterface;
use App\Services\AirportsService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CurlServiceInterface::class, AirportsService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
