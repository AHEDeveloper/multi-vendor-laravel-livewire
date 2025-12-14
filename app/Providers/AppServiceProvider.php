<?php

namespace App\Providers;


use App\Repository\admin\Categorys\CategoryAdminRepository;
use App\Repository\admin\Categorys\CategoryAdminRepositoryInterface;
use App\Repository\admin\Country_State_City\CountryStateCityAdminRepository;
use App\Repository\admin\Country_State_City\CountryStateCityAdminRepositoryInterface;
use App\Repository\admin\Product\ProductAdminRepository;
use App\Repository\admin\Product\ProductAdminRepositoryInterface;
use App\Repository\admin\Seller\SellerAdminRepository;
use App\Repository\admin\Seller\SellerAdminRepositoryInterface;
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
        $this->app->singleton(SellerAdminRepositoryInterface::class,SellerAdminRepository::class);
        $this->app->singleton(ProductAdminRepositoryInterface::class,ProductAdminRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
