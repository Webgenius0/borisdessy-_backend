<?php

use App\Http\Controllers\Web\Backend\DashboardController;
use Illuminate\Support\Facades\Route;


Route::controller(DashboardController::class)->group(function(){
    Route::get('card','card')->name('card.index');
    Route::get('dashboard','index')->name('admin.dashboard');
    Route::post('card-store','store')->name('card.store');
});