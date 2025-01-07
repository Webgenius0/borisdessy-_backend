<?php

use App\Http\Controllers\Web\Backend\BlogController;
use App\Http\Controllers\Web\Backend\DashboardController;
use Illuminate\Support\Facades\Route;


Route::controller(DashboardController::class)->group(function(){
    Route::get('card','card')->name('card.index');
    Route::get('dashboard','index')->name('admin.dashboard');
    Route::post('card-store','store')->name('card.store');
    Route::post('card-update','update')->name('card.update');
    Route::post('card-delete','destroy')->name('card.destroy');
});

Route::controller(BlogController::class)->group(function(){
    Route::get('blog','index')->name('blog.index');
    Route::get('blog-create','create')->name('blog.create');
    Route::post('blog-store','store')->name('blog.store');
    Route::get('blog-edit/{id}','edit')->name('blog.edit');
    Route::post('blog-update','update')->name('blog.update');
    Route::get('blog-delete/{id}','destroy')->name('blog.destroy');
    
});