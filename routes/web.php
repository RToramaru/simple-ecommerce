<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get', 'post'], '/', [ProductController::class, 'index'])->name('home');
Route::match(['get', 'post'], '/category', [ProductController::class, 'category'])->name('category');
Route::match(['get', 'post'], '{id}/category', [ProductController::class, 'category'])->name('category_id');
Route::match(['get', 'post'], '/{id}/cart/add', [ProductController::class, 'add_cart'])->name('add_cart');
Route::match(['get', 'post'], '/cart', [ProductController::class, 'view_cart'])->name('view_cart');
Route::match(['get', 'post'], '/{id}/removecart', [ProductController::class, 'remove_cart'])->name('remove_cart');
Route::match(['get', 'post'], '/cart/finalize', [ProductController::class, 'finalize'])->name('finalize_cart');
Route::match(['get', 'post'], '/history', [ProductController::class, 'history'])->name('history');
Route::match(['get', 'post'], '/id/history', [ProductController::class, 'history_id'])->name('history_id');
Route::match(['get','post'], 'pay', [ProductController::class, 'pay'])->name('pay');


Route::match(['get', 'post'], '/register', [ClientController::class, 'register'])->name('register');
Route::match(['get', 'post'], '/client/register', [ClientController::class, 'register_client'])->name('register_client');

Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/logout', [UserController::class, 'logout'])->name('logout');