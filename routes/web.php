<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.admin.app');
});
Route::get('/dashborad',\App\Livewire\Admin\Dashboard\Index::class);
