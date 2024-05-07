<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; //add ProductController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('home', [ProductController::class, 'home'])->name('home');
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/create', [ProductController::class, 'create'])->name('create')->middleware('auth');
Route::post('/store', [ProductController::class, 'store'])->name('store')->middleware('auth');
Route::get('/show/{product}', [ProductController::class, 'show'])->name('show')->middleware('auth');
Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/edit/{product}', [ProductController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy')->middleware('auth');




//Route::get('show/{product}', 'ProductController@show')->name('show');
//Route::get('edit/{product}', 'ProductController@edit')->name('edit');
//Route::put('edit/{product}','ProductController@update')->name('update');
//Route::delete('/{product}','ProductController@destroy')->name('destroy');
