<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendController;
// use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\AllAuthController;
use App\Http\Controllers\DefaultController\DefaultController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\User\AttendanceController;
use App\Http\Controllers\User\HomeworkController;
use App\Http\Controllers\User\StudentActivityController;
use App\Http\Controllers\User\UserController as UserUserController;
use Illuminate\Support\Facades\Route;
use Spatie\MediaLibrary\MediaCollections\Models\Media as MediaAlias;
use Illuminate\Support\Facades\Artisan;

// Clear cache
Route::get('/clear', function () {
    Artisan::call('cache:forget spatie.permission.cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache Cleared!";
});

Route::middleware('web')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about');
    
    Route::get('/online/admission', [FrontendController::class, 'admission'])->name('admission');
    Route::post('/online/payment', [FrontendController::class, 'paymentPage'])->name('payment.page');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/school/portal', [FrontendController::class, 'SchoolPortal'])->name('schoolportal');
    Route::get('/parent/login', [FrontendController::class, 'Userlogin'])->name('site.userlogin');
    Route::post('/parent/register', [RegisterController::class, 'UserRegister'])->name('site.userregister');
    Route::post('/user/contact', [ContactController::class, 'store'])->name('contact.store');
    ///Ajax route
    Route::get('/admission/get/class/{id}', [DefaultController::class, 'get_class'])->name('get.class');
    /////End

});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::view('/', 'backend.dashboard.dashboard')->name('dashboard');


    // Route::get('/student/account-info/', [StudentController::class, 'accountInfo'])->name('account.info');
    
    Route::post('/parent/personal-info/update/{id}', [UserUserController::class, 'update'])->name('personal.update');
    Route::get('/edit/password/', [UserUserController::class, 'cPassword'])->name('user.epassword');
    Route::post('/update/password/', [UserUserController::class, 'upassword'])->name('user.upassword');

    // Student Home Work route section
    Route::group(['prefix'=>'/student'],function(){
        Route::resource('report',HomeworkController::class);
        Route::get('/report/show/{id}',[HomeworkController::class,'reportShow'])->name('report.dtls.show');

        Route::get('/student/jug/index',[DailyReportController::class,'jugIndex'])->name('jug.index');

        Route::get('/report/complete/index',[DailyReportController::class,'completeIndex'])->name('complete.index');
      
    });
    Route::group(['prefix'=>'/student'],function(){
        Route::resource('attendance',AttendanceController::class);
      
    });

    // Student Activity route

    Route::group(['prefix'=>'/student'],function(){
        Route::resource('activity',StudentActivityController::class);

        Route::get('/activity/show/{id}',[StudentActivityController::class,'activityShow'])->name('activity.dtls.show');
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
