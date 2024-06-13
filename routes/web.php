<?php


use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\DefaultController\DefaultController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Masjid\MasjidController;
use App\Http\Controllers\User\AttendanceController;
use App\Http\Controllers\User\HomeworkController;
use App\Http\Controllers\User\StudentActivityController;
use App\Http\Controllers\User\UserController as UserUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Clear cache
Route::get('/clear', function () {
    // Artisan::call('cache:forget spatie.permission.cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache Cleared!";
});

Route::controller(FrontendController::class)->middleware('web')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact/store', 'contactStore')->name('contact.store');
    Route::get('/about-us', 'aboutUs')->name('about');
    Route::get('/team-members', 'teamMember')->name('team_member');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/notice', 'notice')->name('notice');
    Route::get('/programs', 'programs')->name('programs');
    Route::get('/program/details/{slug}', 'programDetails')->name('program.details');
    Route::get('/achivements', 'achivements')->name('achivements');
    Route::get('/achivements/details/{slug}', 'achivementDetails')->name('achivement.details');
    Route::get('/news', 'news')->name('news');
    Route::get('/news/details/{slug}', 'newsDetails')->name('news.details');
    Route::get('/online/admission', 'admission')->name('admission');

    Route::post('/online/admission/store', 'onlineAdmissionStore')->name('online.admission.store');
    Route::get('/signin/portal', 'signinPortal')->name('signin.portal');
    Route::get('/signup/portal', 'signupPortal')->name('signup.portal');
    Route::post('/signup/portal/store', 'signupStore')->name('signup.store');
    //Ajax request for get group data
    Route::get('/get/group/{id}', 'getGroup');
});
//masjid route
Route::controller(MasjidController::class)->middleware('web')->as('masjid.')->group(function () {
    Route::get('/masjid-ar-rahman','masjidIndex')->name('index');
    Route::get('/masjid-ar-rahman/about','masjidAbout')->name('about');
    Route::get('/masjid-ar-rahman/service','masjidService')->name('service');
    Route::get('/masjid-ar-rahman/service/details','masjidServiceDetails')->name('service.details');
    Route::get('/masjid-ar-rahman/gallery','masjidGallery')->name('gallery');
});
//In this route ,admin, teacher, student, parent route
Route::middleware('web')->group(function () {
    Route::post('/login-store', [LoginController::class, 'portalLoginStore'])->name('portal.login.store');
});

///Ajax route
// Route::get('/admission/get/class/{id}', [DefaultController::class, 'get_class'])->name('get.class');
/////End
Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::view('/', 'backend.parent.dashboard.dashboard')->name('dashboard');
    Route::post('/logout', [LoginController::class, 'parentLogout'])->name('logout');

    // Route::get('/student/account-info/', [StudentController::class, 'accountInfo'])->name('account.info');

    Route::post('/parent/personal-info/update/{id}', [UserUserController::class, 'update'])->name('personal.update');
    Route::get('/edit/password/', [UserUserController::class, 'cPassword'])->name('user.epassword');
    Route::post('/update/password/', [UserUserController::class, 'upassword'])->name('user.upassword');

    // Student Home Work route section
    Route::group(['prefix' => '/student'], function () {
        Route::resource('report', HomeworkController::class);
        Route::get('/report/show/{id}', [HomeworkController::class, 'reportShow'])->name('report.dtls.show');

        Route::get('/student/jug/index', [DailyReportController::class, 'jugIndex'])->name('jug.index');

        Route::get('/report/complete/index', [DailyReportController::class, 'completeIndex'])->name('complete.index');
    });
    Route::group(['prefix' => '/student'], function () {
        Route::resource('attendance', AttendanceController::class);
    });

    // Student Activity route

    Route::group(['prefix' => '/student'], function () {
        Route::resource('activity', StudentActivityController::class);

        Route::get('/activity/show/{id}', [StudentActivityController::class, 'activityShow'])->name('activity.dtls.show');
        Route::get('/activity/average', [ActivityController::class, 'activityCreate'])->name('activity.activityCreate');
    });

    /////////////////////////Default routes////////////////////////////////
    //Get Data ajax
    // Route::get('/get/section/{id}', [DefaultController::class,'get_section'])->name('get.sectoin');
    // Route::get('/get/subject/{id}', [DefaultController::class,'get_subject'])->name('get.subject');
    // Route::get('/get/student/{id}', [DefaultController::class,'get_student'])->name('get.student');
    // Route::get('/get/attendance/subject/{id}', [DefaultController::class,'get_subject_att']);
    /////////////////////////Default routes////////////////////////////////
});
