<?php

use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\AllAuthController;
use App\Http\Controllers\DefaultController\DefaultController;
use App\Http\Controllers\Frontend\LoginController;
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

Route::prefix('dashboard')->middleware('teacher')->name('teacher.')->group(function () {
    Route::view('/', 'backend.teacher.dashboard.dashboard')->name('dashboard');
    Route::post('/logout', [LoginController::class, 'teacherLogout'])->name('logout');

    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile', 'getProfile')->name('profile');
        Route::post('/profile/update/{teacher}', 'update')->name('profile.update');
        Route::get('/edit/password/', 'cPassword')->name('epassword');
        Route::post('/update/password/{teacher}', 'upassword')->name('upassword');
    });



  // Class route here
  Route::prefix('/academic')->controller(GroupController::class)->group(function () {
    Route::get('group/index','index')->name('group.index');
    Route::post('group/store','store')->name('group.store');
    Route::put('group/update/{group}','update')->name('group.update');
    Route::get('group/destroy/{group}','destroy')->name('group.destroy');
    Route::post('group/status/{group}','status')->name('group.status');
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
    // Student attendance route
    Route::group(['prefix' => '/student'], function () {
        Route::resource('attendance', AttendanceController::class);
        Route::get('attendance/sheet/{class}/{date}', [AttendanceController::class,'atten_show'])->name('atten.show');
        Route::get('attendance/delete/{class}/{date}', [AttendanceController::class,'atten_delete'])->name('atten.delete');
        Route::post('attendance/update/', [AttendanceController::class,'atten_update'])->name('attenUpdate');
    });
    // teacher attendance route
    Route::group(['prefix' => '/teacher'], function () {

        Route::get('attendance/sheet/index/', [AttendanceController::class,'myAttenIndex'])->name('my.atten.index');

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
        // Route::resource('homework',HomeworkController::class);

        Route::get('submit/report/index',[StudentActivityController::class,'reportIndex'])->name('report.index');
        Route::get('/report/show/{id}',[StudentActivityController::class,'reportShow'])->name('report.show');
        Route::get('submit/report/complete',[StudentActivityController::class,'reportComplete'])->name('report.complete');

        Route::post('/report/status/{id}',[StudentActivityController::class,'reportStatus'])->name('report.status');

    });

    Route::group(['prefix'=>'/student'],function(){
        Route::resource('activity',StudentActivityController::class);
        Route::get('/activity/delete/{id}',[StudentActivityController::class,'actidelete'])->name('activity.delete');
        Route::get('/average/activity/',[StudentActivityController::class,'averageActivity'])->name('average.activity');


        Route::get('activity/sheet/{class}/{date}', [StudentActivityController::class,'activity_show'])->name('activity_show');
        Route::get('activity/delete/{class}/{date}', [StudentActivityController::class,'activity_delete'])->name('activity_delete');

    });

    Route::group(['prefix'=>'/teacher'],function(){

        Route::get('responsibility/index/',[TeacherController::class,'responsIndex'])->name('respons.index');
        Route::get('responsibility/create/',[TeacherController::class,'responsCreate'])->name('respons.create');


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
