<?php
use App\Http\Controllers\AllAuthController;
use App\Http\Controllers\Principle\PrincipleController;
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
    Route::get('/login', [AllAuthController::class, 'principleLogin'])->name('principle.login');
    Route::post('/login-store', [AllAuthController::class, 'principleloginstore'])->name('principle.login.store');
});


Route::prefix('dashboard')->middleware('principle')->name('principle.')->group(function () {
    Route::view('/', 'backend.dashboard.dashboard')->name('dashboard');
    Route::post('/logout', [AllAuthController::class, 'principlelogout'])->name('logout');

    Route::get('/principle', [PrincipleController::class, 'index'])->name('index');
    Route::post('/principle/store', [PrincipleController::class, 'store'])->name('store');
    Route::get('/create', [PrincipleController::class, 'create'])->name('create');
    Route::get('/profile', [PrincipleController::class, 'getProfile'])->name('profile');
    Route::get('/principle/edit/{id}', [PrincipleController::class, 'edit'])->name('edit');
    Route::post('/principle/update/{id}', [PrincipleController::class, 'update'])->name('update');
    Route::get('/principle/destroy/{id}', [PrincipleController::class, 'destroy'])->name('destroy');
    Route::get('/edit/password/', [PrincipleController::class, 'cPassword'])->name('epassword');
    Route::post('/update/password/', [PrincipleController::class, 'upassword'])->name('upassword');
    
});