<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::post('locale', [LocaleController::class,'change_locale'])->name('locale');

Route::get('category/{category}', [ProductController::class,'brandGetAll'])->name('brandAll');

Route::get('brand/{brand}',[ProductController::class,'brand'])->name('brand');

Route::get('getBrand/{brand}',[ProductController::class,'getBrand'])->name('getBrand');

Route::get('login',[AuthController::class,'login'])->name('login');

Route::post('logout',[AuthController::class,'logout'])->name('logout');

Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');

Route::get('register',[AuthController::class,'register'])->name('register');

Route::post('register_store',[AuthController::class,'register_store'])->name('register_store');

Route::resource('product',ProductController::class);

Route::redirect('/', 'product', 301);