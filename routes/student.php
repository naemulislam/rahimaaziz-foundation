<?php
use App\Http\Controllers\DefaultController\DefaultController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Student\ActivityController;
use App\Http\Controllers\Student\AttendanceController;
use App\Http\Controllers\Student\DailyReportController;
use App\Http\Controllers\Student\FeesController;
use App\Http\Controllers\Student\HomeworkController;
use App\Http\Controllers\Student\JugController;
use App\Http\Controllers\Student\StudentController;
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
    Route::view('/', 'backend.student.dashboard.dashboard')->name('dashboard');
    Route::post('/logout', [LoginController::class, 'studentLogout'])->name('logout');


    Route::controller(StudentController::class)->group(function(){

    Route::get('/profile', 'profile')->name('profile');
    // Route::get('/account-info', 'accountInfo')->name('account.info');
    //Route::get('/profile', [StudentController::class, 'getProfile'])->name('profile');
    Route::put('/profile/update/{student}', 'update')->name('profile.update');
    Route::put('/profile/document/update/{student}', 'updateDocument')->name('document.update');

    Route::get('/edit/password/', 'cPassword')->name('epassword');
    Route::post('/update/password/{student}', 'updatePassword')->name('password.update');
    // Route::get('/admission/fee/', [StudentController::class, 'admissionFee'])->name('admission.fee');
    Route::post('/admission/fee/store/{student}', 'admissionFeeStore')->name('admission.fee.store');
    });



    Route::group(['prefix'=>'/student'],function(){
        // Route::resource('report',DailyReportController::class);
        Route::get('/report/index',[DailyReportController::class,'index'])->name('report.index');
        Route::get('/report/create',[DailyReportController::class,'create'])->name('report.create');
        Route::post('/report/store',[DailyReportController::class,'store'])->name('report.store');
        Route::get('/report/edit/{dailyReport}',[DailyReportController::class,'edit'])->name('report.edit');
        Route::put('/report/update/{dailyReport}',[DailyReportController::class,'update'])->name('report.update');
        Route::get('/report/show/{dailyReport}',[DailyReportController::class,'show'])->name('report.show');
        Route::get('/report/delete/{dailyReport}',[DailyReportController::class,'reportDelete'])->name('report.destroy');
        Route::get('/report/juz/index',[DailyReportController::class,'completeIndex'])->name('report.juz.index');


    });
    Route::controller(AttendanceController::class)->group(function(){
        Route::get('attendance/index', 'index')->name('attendance.index');
    });
    //Monthly fees payment route
    Route::controller(FeesController::class)->prefix('/student')->group(function(){
        Route::get('/fees/index', 'index')->name('fees.index');
        Route::get('/fees/create', 'create')->name('fees.create');
        Route::post('fees/store', 'store')->name('fees.store');
        Route::get('fees/show/{fees}', 'show')->name('fees.show');
        Route::get('/fees/partial/edit/{fees}', 'partialEdit')->name('fees.partial.edit');
        Route::post('/fees/partial/update/{fees}', 'partialUpdate')->name('fees.partial.update');
        Route::get('/fees/payment/invoice/{fees}', 'feesPaymentInvoice')->name('fees.payment.invoice');
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
