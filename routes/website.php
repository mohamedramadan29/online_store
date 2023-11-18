<?php

use Illuminate\Support\Facades\Route;
Route::get('/', [\App\Http\Controllers\WebsiteController::class, 'index'])->name('index');
Route::get('/categories', [\App\Http\Controllers\WebsiteController::class, 'all_categories'])->name('all_categories');
Route::get('/category/{slug}',[\App\Http\Controllers\WebsiteController::class,'category_slug'])->name('category_slug');
Route::get('/product/{slug}',[\App\Http\Controllers\WebsiteController::class,'product_details'])->name('product_details');
Route::post('product/add_to_cart',[\App\Http\Controllers\CartController::class,'addToCart'])->name('product.add_to_cart');
Route::group(['middleware'=>'auth',],function (){
    Route::get('/cart',[\App\Http\Controllers\CartController::class,'index'])->name('cart.index');
    Route::delete('/cart/destroy/{id}',[\App\Http\Controllers\CartController::class,'destroy'])->name('cart.destroy');
    Route::post('cart/update',[\App\Http\Controllers\CartController::class,'update'])->name('cart.update');
    Route::get('checkout',[\App\Http\Controllers\CheckoutController::class,'checkout'])->name('checkout.index');
});

