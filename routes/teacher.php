<?php

use App\Http\Controllers\AllAuthController;
use App\Http\Controllers\DefaultController\DefaultController;
use App\Http\Controllers\Teacher\AdmissionController;
use App\Http\Controllers\Teacher\AttendanceController;
use App\Http\Controllers\Teacher\CategoryController;
use App\Http\Controllers\Teacher\ClassController;
use App\Http\Controllers\Teacher\HomeworkController;
use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\Teacher\RegisterController;
use App\Http\Controllers\Teacher\SectionController;
use App\Http\Controllers\Teacher\StudentActivityController;
use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\SubjectController;
use App\Http\Controllers\Teacher\TeacherController;
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
    Route::get('/login', [AllAuthController::class, 'teacherLogin'])->name('teacher.login');
    Route::post('/login-store', [AllAuthController::class, 'teacherloginstore'])->name('teacher.login.store');
    Route::post('/teacher/store', [RegisterController::class, 'register'])->name('teacher.register');
     Route::get('/get/subject/{id}', [DefaultController::class,'get_subject'])->name('gesubject');
});


Route::prefix('dashboard')->middleware('teacher')->name('teacher.')->group(function () {
    Route::view('/', 'backend.dashboard.dashboard')->name('dashboard');
    Route::post('/logout', [AllAuthController::class, 'teacherlogout'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'getProfile'])->name('profile');
    Route::get('/teacher/store', [ProfileController::class, 'store'])->name('store');
    Route::get('/teacher/edit/{id}', [ProfileController::class, 'edit'])->name('edit');
    Route::post('/teacher/update/{id}', [ProfileController::class, 'update'])->name('update');
    Route::get('/edit/password/', [ProfileController::class, 'cPassword'])->name('epassword');
    Route::post('/update/password/', [ProfileController::class, 'upassword'])->name('upassword');


  
    //Category
    Route::group(['prefix' => '/academic'], function () {
        Route::resource('category', CategoryController::class);
        // Route::get('/category/edit/', [CategoryController::class, 'editsms'])->name('category.edit.sms');
        // Route::post('/category/status/{id}', [CategoryController::class, 'status'])->name('category.status');
    });
    // Class route here
    Route::group(['prefix' => '/academic'], function () {
        Route::resource('class', ClassController::class);
        // Route::post('/class/status/{id}', [ClassController::class, 'status'])->name('class.status');
    });
    // Section route
    Route::group(['prefix' => '/academic'], function () {
        Route::resource('section', SectionController::class);
        // Route::post('/section/status/{id}', [SectionController::class, 'status'])->name('section.status');
    });
    // Section route
    Route::group(['prefix' => '/academic'], function () {
        Route::resource('subject', SubjectController::class);
        // Route::post('/subject/status/{id}', [SubjectController::class, 'status'])->name('subject.status');
    });
    // Student management route
    Route::group(['prefix' => '/student-info'], function () {
        Route::resource('student', StudentController::class);
        // Route::post('/student/status/{id}', [StudentController::class, 'status'])->name('student.status');
    });
    // Student management route
    Route::group(['prefix' => '/teacher-info'], function () {
        Route::resource('teacher', TeacherController::class);
        // Route::post('/teacher/status/{id}', [TeacherController::class, 'status'])->name('teacher.status');
    });
    // attendance route
    Route::group(['prefix' => '/student'], function () {
        Route::resource('attendance', AttendanceController::class);
        Route::get('attendance/sheet/{class}/{date}', [AttendanceController::class,'atten_show'])->name('atten.show');
        Route::get('attendance/delete/{class}/{date}', [AttendanceController::class,'atten_delete'])->name('atten.delete');
    });
    // admission route
    Route::group(['prefix' => '/student'], function () {
        Route::resource('admission', AdmissionController::class);
        // Route::post('/admission/status/{id}', [AdmissionController::class, 'status'])->name('admission.status');
    });
    Route::group(['prefix' => '/admission'], function () {
        Route::get('/panding', [AdmissionController::class, 'pandingindex'])->name('panding.admission');
        Route::post('/status/{id}', [AdmissionController::class, 'status'])->name('admission.status');
    });
    Route::group(['prefix'=>'/student'],function(){
        Route::resource('homework',HomeworkController::class);
        
        Route::get('homework/destroy/{id}',[HomeworkController::class,'homeworkdestroy'])->name('homework.destroy');
        Route::get('/submitted/hw/',[HomeworkController::class,'getallwh'])->name('hw.all.submit');
        Route::get('/submitted/hw/{id}',[HomeworkController::class,'gethwshow'])->name('hw.show.submit');
        Route::post('/submitted/update/{id}',[HomeworkController::class,'Commentpost'])->name('hw.comment.update');
    });

    Route::group(['prefix'=>'/student'],function(){
        Route::resource('activity',StudentActivityController::class);
        Route::get('/activity/create/{id}',[StudentActivityController::class,'activityCreate'])->name('activity.activityCreate');
        Route::post('/activity/store',[StudentActivityController::class,'activityStore'])->name('activity.activityStore');
        Route::get('/activity/delete/{id}',[StudentActivityController::class,'actidelete'])->name('activity.delete');
        Route::post('/find/activity',[StudentActivityController::class,'findActivity'])->name('find.activity');

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