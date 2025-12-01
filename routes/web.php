<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use \App\Livewire\Admin\Country\Index as CountryIndex;
use \App\Livewire\Admin\Product\Index as ProductIndex;

Route::get('/', function () {
    return view('layouts.admin.app');
});


Route::get('/admin/dashboard',DashboardIndex::class)->name('admin.dashboard.index');
Route::get('/admin/country',CountryIndex::class)->name('admin.country.index');
Route::get('/admin/product',ProductIndex::class)->name('admin.product.index');
