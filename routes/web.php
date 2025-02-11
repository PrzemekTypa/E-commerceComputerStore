<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\SubscriptionController;

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

Route::get('/view_category',[AdminController::class,'view_category']);

Route::post('/add_category',[AdminController::class,'add_category']);

Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);

Route::get('/view_product',[AdminController::class,'view_product']);

Route::post('/add_product',[AdminController::class,'add_product']);

Route::get('/show_product',[AdminController::class,'show_product']);

Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

Route::get('/update_product/{id}',[AdminController::class,'update_product']);

Route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

Route::get('/order',[AdminController::class,'order']);

Route::get('/delivered/{id}',[AdminController::class,'delivered']);

Route::get('/send_email/{id}',[AdminController::class,'send_email']);

Route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);








Route::get('/product_details/{id}',[HomeController::class,'product_details']);

Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

Route::get('/show_cart',[HomeController::class,'show_cart']);

Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

Route::get('/cash_order',[HomeController::class,'cash_order']);

Route::get('/payment_unavailable', [HomeController::class, 'payment_unavailable']);

Route::get('/about', [HomeController::class, 'about']);

Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');


