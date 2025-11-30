<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use \App\Livewire\Admin\Country\Index as CountryIndex;

Route::get('/', function () {
    return view('layouts.admin.app');
});
Route::get('/dashboard',DashboardIndex::class)->name('admin.dashboard.index');
Route::get('/country',CountryIndex::class)->name('admin.country.index');
