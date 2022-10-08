<?php
use App\Http\Controllers\AllAuthController;
use App\Http\Controllers\DefaultController\DefaultController;
use App\Http\Controllers\Student\HomeworkController;
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

 
    Route::get('/student/account-info/', [StudentController::class, 'accountInfo'])->name('account.info');
    //Route::get('/profile', [StudentController::class, 'getProfile'])->name('profile');
    Route::post('/student/personal-info/update/{id}', [StudentController::class, 'update'])->name('personal.update');
   
    Route::get('/edit/password/', [StudentController::class, 'cPassword'])->name('epassword');
    Route::post('/update/password/', [StudentController::class, 'upassword'])->name('upassword');


    Route::group(['prefix'=>'/student'],function(){
        Route::resource('homework',HomeworkController::class);
        Route::get('completed/hw/',[HomeworkController::class,'Hwindex'])->name('hw.index');
        Route::get('homework/create/{id}',[HomeworkController::class,'homeworkcreate'])->name('homework.hw_create');
        Route::get('homework/show/{id}',[HomeworkController::class,'homeworkshow'])->name('homework.hw_show');
        Route::get('homework/destroy/{id}',[HomeworkController::class,'homeworkdestroy'])->name('homework.destroy');
    });

    /////////////////////////Default routes////////////////////////////////
//Get Data ajax
Route::get('/get/class/{id}', [DefaultController::class,'get_class'])->name('get.class');
Route::get('/get/section/{id}', [DefaultController::class,'get_section'])->name('get.sectoin');
Route::get('/get/subject/{id}', [DefaultController::class,'get_subject'])->name('get.subject');
Route::get('/get/student/{id}', [DefaultController::class,'get_student'])->name('get.student');
Route::get('/get/attendance/subject/{id}', [DefaultController::class,'get_subject_att']);
/////////////////////////Default routes////////////////////////////////
    
});