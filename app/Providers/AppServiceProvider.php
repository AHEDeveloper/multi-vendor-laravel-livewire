<?php

namespace App\Providers;

use App\Repository\Country_State_City\CountryStateCityAdminRepository;
use App\Repository\Country_State_City\CountryStateCityAdminRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CountryStateCityAdminRepositoryInterface::class,CountryStateCityAdminRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
