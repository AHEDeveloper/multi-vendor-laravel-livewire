<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use \App\Livewire\Admin\Country\Index as CountryIndex;
use \App\Livewire\Admin\Product\Index as ProductIndex;
use \App\Livewire\Admin\Product\Creat as ProductCreat;
use \App\Livewire\Admin\Category\Index as CategoryIndex;
use \App\Livewire\Admin\Category\Feature as CategoryFeature;

Route::get('/', function () {
    return view('layouts.admin.app');
});


Route::get('/admin/dashboard',DashboardIndex::class)->name('admin.dashboard.index');
Route::get('/admin/country',CountryIndex::class)->name('admin.country.index');
Route::get('/admin/product',ProductIndex::class)->name('admin.product.index');
Route::get('/admin/product/create',ProductCreat::class)->name('admin.product.create');
Route::get('/admin/category',CategoryIndex::class)->name('admin.category.index');
Route::get('/admin/category/{category_id}/feature',CategoryFeature::class)->name('admin.feature.index');
