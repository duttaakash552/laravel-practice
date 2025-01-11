<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CustomerController;

Route::group(['middleware'=>'GuestMiddleware'], function() {
	Route::get('/', [UserController::class, 'index'])->name('home');
	Route::post('/register', [UserController::class, 'register'])->name('register');
	Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');
});

Route::group(['middleware'=>'AuthMiddleware'], function() {
	Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
	Route::post('/submit-post', [PostController::class, 'submit'])->name('submit.post');
	Route::get('/delete-post/{id}', [PostController::class, 'delete_post'])->name('delete.post');
	Route::get('/show-post/{id}', [PostController::class, 'show_post'])->name('show.post');
	Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::group(['middleware'=>'CustomerGuestMiddleware'], function() {
	Route::match(['get', 'post'], '/customer-register', [CustomerController::class, 'index'])->name('customer.home');
	Route::match(['get', 'post'], '/customer-login', [CustomerController::class, 'login'])->name('customer.login');
});

Route::group(['middleware'=>'CustomerAuthMiddleware'], function() {
	Route::get('/customer-dashboard', [CustomerController::class, 'customer_dashboard'])->name('customer.dashboard');
	Route::get('/customer-logout', [CustomerController::class, 'logout'])->name('customer.logout');
});
