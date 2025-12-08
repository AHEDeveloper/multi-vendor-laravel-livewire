<?php

namespace App\Providers;


use App\Repository\admin\Categorys\CategoryAdminRepository;
use App\Repository\admin\Categorys\CategoryAdminRepositoryInterface;
use App\Repository\admin\Country_State_City\CountryStateCityAdminRepository;
use App\Repository\admin\Country_State_City\CountryStateCityAdminRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CountryStateCityAdminRepositoryInterface::class,CountryStateCityAdminRepository::class);
        $this->app->singleton(CategoryAdminRepositoryInterface::class,CategoryAdminRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
