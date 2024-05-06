<?php
use App\Http\Controllers\AllAuthController;
use App\Http\Controllers\DefaultController\DefaultController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Student\ActivityController;
use App\Http\Controllers\Student\AttendanceController;
use App\Http\Controllers\Student\DailyReportController;
use App\Http\Controllers\Student\FeesController;
use App\Http\Controllers\Student\HomeworkController;
use App\Http\Controllers\Student\JugController;
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
Route::prefix('dashboard')->middleware('student')->name('student.')->group(function () {
    Route::view('/', 'backend.dashboard.dashboard')->name('dashboard');
    Route::post('/logout', [LoginController::class, 'studentLogout'])->name('logout');


    Route::get('/student/account-info/', [StudentController::class, 'accountInfo'])->name('account.info');
    //Route::get('/profile', [StudentController::class, 'getProfile'])->name('profile');
    Route::post('/student/personal-info/update/{id}', [StudentController::class, 'update'])->name('personal.update');

    Route::get('/edit/password/', [StudentController::class, 'cPassword'])->name('epassword');
    Route::post('/update/password/', [StudentController::class, 'upassword'])->name('upassword');


    Route::group(['prefix'=>'/student'],function(){
        Route::resource('report',DailyReportController::class);
        Route::get('/report/delete/{id}',[DailyReportController::class,'reportDelete'])->name('report.destroy');
        Route::get('/jug/index',[JugController::class,'jugIndex'])->name('jug.index');

        Route::get('/report/complete/index',[JugController::class,'completeIndex'])->name('complete.index');

        Route::get('homework/destroy/{id}',[HomeworkController::class,'homeworkdestroy'])->name('homework.destroy');
    });
    Route::group(['prefix'=>'/student'],function(){
        Route::resource('attendance',AttendanceController::class);

    });
    //Monthly fees payment route
    Route::group(['prefix'=>'/student'],function(){
        Route::resource('fees',FeesController::class);
        Route::get('/fees/payment/invoice/{id}',[FeesController::class,'feesPaymentInvoice'])->name('fees.payment.invoice');
        Route::get('/fees/partial/edit/{id}',[FeesController::class,'partialEdit'])->name('fees.partial.edit');
        Route::post('/fees/partial/update/{id}',[FeesController::class,'partialUpdate'])->name('fees.partial.update');

    });

    Route::group(['prefix'=>'/student'],function(){
        Route::resource('activity',ActivityController::class);

        Route::get('/activity/average',[ActivityController::class,'activityCreate'])->name('activity.activityCreate');


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
