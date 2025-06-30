<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AlQuranController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardNewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalSholatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/quran', [AlQuranController::class, 'index']);
Route::get('/quran/{id}', [AlQuranController::class, 'show']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{news:slug}', [NewsController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest:admin');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']); 

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth:admin');

Route::get('/dashboard/news/checkSlug', [DashboardNewsController::class, 'checkSlug'])->middleware('auth:admin');
Route::resource('/dashboard/news', DashboardNewsController::class)->middleware('auth:admin');

Route::get('/dashboard/categories/checkSlug', [DashboardCategoryController::class, 'checkSlug'])->middleware('auth:admin');
Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware('auth:admin');

Route::get('/jadwal-sholat', [JadwalSholatController::class, 'index'])->name('jadwal');
