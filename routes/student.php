<?php
use App\Http\Controllers\AllAuthController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\RegisterController;
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
    Route::get('/login', [AllAuthController::class, 'studentLogin'])->name('student.login');
    Route::post('/login-store', [AllAuthController::class, 'studentloginstore'])->name('student.login.store');
    Route::post('/store', [RegisterController::class, 'register'])->name('student.register');
});


Route::prefix('dashboard')->middleware('student')->name('student.')->group(function () {
    Route::view('/', 'backend.dashboard.dashboard')->name('dashboard');
    Route::post('/logout', [AllAuthController::class, 'studentlogout'])->name('logout');

 
    Route::get('/profile', [StudentController::class, 'getProfile'])->name('profile');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('update');
   
    Route::get('/edit/password/', [StudentController::class, 'cPassword'])->name('epassword');
    Route::post('/update/password/', [StudentController::class, 'upassword'])->name('upassword');
    
});