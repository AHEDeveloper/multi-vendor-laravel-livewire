<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use \App\Livewire\Admin\Country\Index as CountryIndex;
use \App\Livewire\Admin\Product\Index as ProductIndex;
use \App\Livewire\Admin\Product\Creat as ProductCreat;
use \App\Livewire\Admin\Category\Index as CategoryIndex;
use \App\Livewire\Admin\Category\Feature as CategoryFeature;
use \App\Livewire\Admin\MegaMenu\Index as MegaMenuIndex;
use \App\Livewire\Admin\MegaMenu\Feature as MegaMenuFeature;
use \App\Livewire\Admin\MegaMenu\Value as MegaMenuValue;
use \App\Livewire\Admin\Weblog\Index as WeblogIndex;
use \App\Livewire\Admin\Weblog\Create as WeblogCreate;
use \App\Livewire\Admin\Weblog\Category as WeblogCategory;


Route::get('/', function () {
    return view('layouts.admin.app');
});


Route::get('/admin/dashboard',DashboardIndex::class)->name('admin.dashboard.index');
Route::get('/admin/country',CountryIndex::class)->name('admin.country.index');
Route::get('/admin/product',ProductIndex::class)->name('admin.product.index');
Route::get('/admin/product/create',ProductCreat::class)->name('admin.product.create');
Route::get('/admin/category',CategoryIndex::class)->name('admin.category.index');
Route::get('/admin/category/{category}/feature',CategoryFeature::class)->name('admin.feature.index');
Route::get('/admin/category/{feature}/detail',CategoryFeature::class)->name('admin.detail.index');
Route::get('/admin/category/feature/{detail}/value',CategoryFeature::class)->name('admin.value.index');

Route::get('/admin/menu/category',MegaMenuIndex::class)->name('admin.menu.index');
Route::get('/admin/menu/{category}/feature',MegaMenuFeature::class)->name('admin.menu.ّّّfeature');
Route::get('/admin/menu/category/{feature}/value',MegaMenuValue::class)->name('admin.menu.value');

Route::get('admin/weblog',WeblogIndex::class)->name('admin.weblog.index');
Route::get('admin/weblog/create',WeblogCreate::class)->name('admin.weblog.create');
Route::get('admin/weblog/category',WeblogCategory::class)->name('admin.weblog.category');
