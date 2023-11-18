<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // website links p
    include 'website.php';
    // admin Routes
    Route::group(['middleware'=>'auth','is_admin','prefix'=>'admin'],function (){
    Route::get('/dashboard',[\App\Http\Controllers\admin\AdminController::class,'index'])->name('dashboard');
    Route::resource('/categories',\App\Http\Controllers\admin\CategoryController::class);
    Route::resource('/products',\App\Http\Controllers\admin\ProductController::class);
    });

});





/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/


