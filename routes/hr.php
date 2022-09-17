<?php
use App\Http\Controllers\AllAuthController;
use App\Http\Controllers\Hr\HrController;
use App\Http\Controllers\Hr\CategoryController;

use App\Http\Controllers\Hr\SectionController;
use App\Http\Controllers\Hr\StudentController;
use App\Http\Controllers\Hr\SubjectController;
use App\Http\Controllers\Hr\TeacherController;
use App\Http\Controllers\DefaultController\DefaultController;
use App\Http\Controllers\Hr\ClassController;
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
    Route::get('/login', [AllAuthController::class, 'hrLogin'])->name('hr.login');
    Route::post('/login-store', [AllAuthController::class, 'hrloginstore'])->name('hr.login.store');
});


Route::prefix('dashboard')->middleware('hr')->name('hr.')->group(function () {
    Route::view('/', 'backend.dashboard.dashboard')->name('dashboard');
    Route::post('/logout', [AllAuthController::class, 'hrlogout'])->name('logout');

    Route::get('/hr', [HrController::class, 'index'])->name('index');

    Route::get('/profile', [HrController::class, 'getProfile'])->name('profile');
    Route::get('/hr/edit/{id}', [HrController::class, 'edit'])->name('edit');
    Route::post('/hr/update/{id}', [HrController::class, 'update'])->name('update');
   
    Route::get('/edit/password/', [HrController::class, 'cPassword'])->name('epassword');
    Route::post('/update/password/', [HrController::class, 'upassword'])->name('upassword');
    

    //Category
    Route::group(['prefix' => '/academic'], function () {
        Route::resource('category', CategoryController::class);
        Route::post('/category/status/{id}', [CategoryController::class, 'status'])->name('category.status');
    });
    // Class route here
    Route::group(['prefix' => '/academic'], function () {
        Route::resource('class', ClassController::class);
        Route::post('/class/status/{id}', [ClassController::class, 'status'])->name('class.status');
    });
    // Section route
    Route::group(['prefix' => '/academic'], function () {
        Route::resource('section', SectionController::class);
        Route::post('/section/status/{id}', [SectionController::class, 'status'])->name('section.status');
    });
    // Section route
    Route::group(['prefix' => '/academic'], function () {
        Route::resource('subject', SubjectController::class);
        Route::post('/subject/status/{id}', [SubjectController::class, 'status'])->name('subject.status');
    });
    // Student management route
    Route::group(['prefix' => '/student-info'], function () {
        Route::resource('student', StudentController::class);
        Route::post('/student/status/{id}', [StudentController::class, 'status'])->name('student.status');
    });
    // Student management route
    Route::group(['prefix' => '/teacher-info'], function () {
        Route::resource('teacher', TeacherController::class);
        Route::post('/teacher/status/{id}', [TeacherController::class, 'status'])->name('teacher.status');
    });
    // attendance route
    Route::group(['prefix' => '/attendance'], function () {
        Route::resource('attendance', AttendanceController::class);
        Route::post('/att/status/{id}', [AttendanceController::class, 'status'])->name('att.status');
    });
    // admission route
    Route::group(['prefix' => '/student'], function () {
        Route::resource('admission', AdmissionController::class);
        Route::post('/admission/status/{id}', [AdmissionController::class, 'status'])->name('admission.status');
    });
    Route::group(['prefix' => '/admission'], function () {
        Route::get('/panding', [AdmissionController::class, 'pandingindex'])->name('panding.admission');
        Route::post('/status/{id}', [AdmissionController::class, 'status'])->name('admission.status');
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