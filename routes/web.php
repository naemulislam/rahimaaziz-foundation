<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\AllAuthController;
use App\Http\Controllers\DefaultController\DefaultController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\User\HomeworkController;
use App\Http\Controllers\User\StudentActivityController;
use Illuminate\Support\Facades\Route;
use Spatie\MediaLibrary\MediaCollections\Models\Media as MediaAlias;

Route::middleware('web')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/nikah-service', [FrontendController::class, 'nikah'])->name('nikah');
    Route::get('/daily-jumuah', [FrontendController::class, 'daily'])->name('daily');
    Route::get('/quran-tafsir', [FrontendController::class, 'quran'])->name('quran');
    Route::get('/ramadan', [FrontendController::class, 'ramadan'])->name('ramadan');
    Route::get('/aims-and-objectives', [FrontendController::class, 'aims'])->name('aims');
    Route::get('/nazirah-program', [FrontendController::class, 'nazirah'])->name('nazirah');
    Route::get('/alim-program', [FrontendController::class, 'alim'])->name('alim');
    Route::get('/after-school-maktab', [FrontendController::class, 'afterSchool'])->name('afterschool');
    Route::get('/weekend-maktab', [FrontendController::class, 'weekendMaktab'])->name('weekendmaktab');
    Route::get('/online/admission', [FrontendController::class, 'admission'])->name('admission');
    Route::post('/online/payment', [FrontendController::class, 'paymentPage'])->name('payment.page');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/Student/login', [FrontendController::class, 'SchoolPortal'])->name('schoolportal');
    Route::get('/parent/login', [FrontendController::class, 'Userlogin'])->name('site.userlogin');
    Route::post('/parent/register', [RegisterController::class, 'UserRegister'])->name('site.userregister');
    ///Ajax route
    Route::get('/admission/get/class/{id}', [DefaultController::class, 'get_class'])->name('get.class');
    /////End

});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::view('/', 'backend.dashboard.dashboard')->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'getProfile'])->name('user.profile');
    Route::get('/user/edit/{id}', [ProfileController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [ProfileController::class, 'update'])->name('user.update');
    Route::get('/edit/password/', [ProfileController::class, 'cPassword'])->name('user.epassword');
    Route::post('/update/password/', [ProfileController::class, 'upassword'])->name('user.upassword');

    // Student Home Work route section
    Route::group(['prefix'=>'/student'],function(){
        Route::resource('homework',HomeworkController::class);
        Route::get('completed/hw/',[HomeworkController::class,'Hwindex'])->name('hw.index');
       
        Route::get('homework/show/{id}',[HomeworkController::class,'homeworkshow'])->name('homework.hw_show');
        Route::post('find/homework',[HomeworkController::class,'findHomework'])->name('find.homework');
    });

    // Student Activity route

    Route::group(['prefix' => '/student'], function () {
        Route::resource('activity', StudentActivityController::class);
        Route::get('/activity/create/{id}', [StudentActivityController::class, 'activityCreate'])->name('activity.activityCreate');
        Route::post('/activity/store', [StudentActivityController::class, 'activityStore'])->name('activity.activityStore');
        Route::get('/activity/delete/{id}', [StudentActivityController::class, 'actidelete'])->name('activity.delete');
        Route::post('/find/activity', [StudentActivityController::class, 'findActivity'])->name('find.activity');
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
