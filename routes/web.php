<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContoller;

Route::get('/', [UserContoller::class,'index']);
Route::get('/login',[UserContoller::class,'loginPage'])->name('login.page');
Route::post('/login',[UserContoller::class,'login'])->name('login');

Route::get('/register',[UserContoller::class,'registerPage'])->name('register.page');
Route::post('/register',[UserContoller::class,'register'])->name('register');


Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[UserContoller::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[UserContoller::class,'logout'])->name('logout');
});

Route::get('/provider/{provider}',[UserContoller::class, 'providerRedirect'])->name('provider.redirect');
Route::get('/auth/{provider}/callback',[UserContoller::class, 'providerAuth'])->name('provider.auth');
