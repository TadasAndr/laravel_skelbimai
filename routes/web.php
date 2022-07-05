<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;
use App\Models\Ad;

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

// home

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::resource('/skelbimai/', \App\Http\Controllers\AdCreate::class);

// display all results

Route::get('/skelbimai', [\App\Http\Controllers\DisplayResults::class, 'display_all_results']);

Route::get('/skelbimas/{id}', [\App\Http\Controllers\DisplayResults::class, 'show'])->name('display.show');

// display by category

Route::get('/skelbimai/{category}', [\App\Http\Controllers\DisplayResults::class, 'display_by_category'])
    ->name('display.category');

// display my ads

Route::get('/mano-skelbimai', [\App\Http\Controllers\DisplayResults::class, 'display_my_ads'])
    ->name('display.my.ads')->middleware('is.auth');

// search

Route::get('/search', [\App\Http\Controllers\DisplayResults::class, 'search']);

// Authentication routes

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin

Route::resource('/admin', \App\Http\Controllers\AdminController::class)->middleware('admin');
