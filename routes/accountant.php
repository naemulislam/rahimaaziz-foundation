<?php

use App\Http\Controllers\Accountant\AccountantController;
use App\Http\Controllers\AllAuthController;
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

Route::middleware('web')->group(function () {
    Route::get('/login', [AllAuthController::class, 'accountantLogin'])->name('accountant.login');
    Route::post('/login-store', [AllAuthController::class, 'accountantloginstore'])->name('accountant.login.store');
});


Route::prefix('dashboard')->middleware('accountant')->name('accountant.')->group(function () {
    Route::view('/', 'backend.dashboard.dashboard')->name('dashboard');
    Route::post('/logout', [AllAuthController::class, 'accountantlogout'])->name('logout');

   
    Route::get('/profile', [AccountantController::class, 'getProfile'])->name('profile');
    Route::get('/accountant/edit/{id}', [AccountantController::class, 'edit'])->name('edit');
    Route::post('/accountant/update/{id}', [AccountantController::class, 'update'])->name('update');
    Route::get('/edit/password/', [AccountantController::class, 'cPassword'])->name('epassword');
    Route::post('/update/password/', [AccountantController::class, 'upassword'])->name('upassword');
    
});