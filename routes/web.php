<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

// Route::get('/', function () { return view('welcome');});

Route::view('/' , 'login');
Route::resource('/auth', AuthController::class);
Route::get('/logout', [AuthController::class , 'logout'])->name('logout');

Route::prefix('superadmin')->group(function () {
    Route::view('/' , 'login');
})->middleware('isLoggedIn');

Route::prefix('admin')->group(function () {})->middleware('isLoggedIn');

Route::prefix('customer')->group(function () {})->middleware('isLoggedIn');


Route::fallback(function() {
    return view('fallback.fallback');
});