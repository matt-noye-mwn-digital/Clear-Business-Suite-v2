<?php

use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Client\ClientIndexController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
//Admin Routes
Route::middleware(['auth', 'role:super admin|admin|staff'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('dashboard', [AdminIndexController::class, 'index'])->name('dashboard');
});

//Client Routes
Route::middleware(['auth', 'role:client'])->name('client.')->prefix('client')->group(function(){
    Route::get('dashboard', [ClientIndexController::class, 'index'])->name('dashboard');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
