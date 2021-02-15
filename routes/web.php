<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('contacts/search',[App\Http\Controllers\ContactController::class, 'search'])->name('search');
Route::get('contacts/list', [App\Http\Controllers\ContactController::class, 'show'])->name('list');
Route::get('contacts/create', [App\Http\Controllers\ContactController::class, 'create'])->name('create');
Route::post('contacts/store', [App\Http\Controllers\ContactController::class, 'store'])->name('store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
