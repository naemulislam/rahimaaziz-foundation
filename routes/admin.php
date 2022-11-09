<?php

use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\HomeworkController;
use App\Http\Controllers\Admin\HrController;
use App\Http\Controllers\Admin\PrayerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StudentActivity;
use App\Http\Controllers\Admin\StudentActivityController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\DefaultController\DefaultController;
use App\Http\Controllers\AllAuthController;
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
    Route::get('/login', [AllAuthController::class, 'adminLogin'])->name('admin.login');
    Route::post('/login-store', [AllAuthController::class, 'adminloginstore'])->name('admin.login.store');
});


Route::prefix('dashboard')->middleware('admin')->name('admin.')->group(function () {
    Route::view('/', 'backend.dashboard.dashboard')->name('dashboard');
    Route::post('/logout', [AllAuthController::class, 'adminlogout'])->name('logout');

    Route::get('/admin', [ProfileController::class, 'index'])->name('index');
    Route::post('/admin/store', [ProfileController::class, 'store'])->name('store');
    Route::get('/create', [ProfileController::class, 'create'])->name('create');
    Route::get('/profile', [ProfileController::class, 'getProfile'])->name('profile');
    Route::get('/admin/edit/{id}', [ProfileController::class, 'edit'])->name('edit');
    Route::post('/admin/update/{id}', [ProfileController::class, 'update'])->name('update');
    Route::get('/admin/destroy/{id}', [ProfileController::class, 'destroy'])->name('destroy');
    Route::get('/edit/password/', [ProfileController::class, 'cPassword'])->name('epassword');
    Route::post('/update/password/', [ProfileController::class, 'upassword'])->name('upassword');

    Route::get('filemanager', [FileManagerController::class, 'index'])->name('filemanager.index');

    Route::group(['prefix'=>'/user'], function(){
        Route::resource('hr',HrController::class);
        Route::get('hr/destroy/{id}',[HrController::class,'deleteHr'])->name('hr.delete');
    });
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
    Route::group(['prefix' => '/student'], function () {
        Route::resource('attendance', AttendanceController::class);
        Route::get('attendance/sheet/{class}/{date}', [AttendanceController::class,'atten_show'])->name('atten.show');
        Route::get('attendance/delete/{class}/{date}', [AttendanceController::class,'atten_delete'])->name('atten.delete');
        
    });
    // admission route
    Route::group(['prefix' => '/student'], function () {
        Route::resource('admission', AdmissionController::class);
        Route::post('/admission/status/{id}', [AdmissionController::class, 'status'])->name('admission.status');
    });
    Route::group(['prefix' => '/admission'], function () {
        Route::get('/panding', [AdmissionController::class, 'pandingindex'])->name('panding.admission');
        Route::get('/panding/details/{slug}', [AdmissionController::class, 'pandingshow'])->name('panding.show');
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
    Route::group(['prefix'=> '/site'],function(){
        Route::resource('setting',SettingController::class);
        Route::post('setting/update/{id}',[SettingController::class,'updateid'])->name('setting.update.data');
    });
    Route::group(['prefix'=> '/about-us'],function(){
        Route::resource('staff',StaffController::class);
        Route::post('staff/status/{id}',[StaffController::class,'status'])->name('staff.status');
    });
    Route::group(['prefix'=> '/contact'],function(){
        Route::resource('message',ContactController::class);
        Route::post('massage/status/{id}',[ContactController::class,'status'])->name('massage.status');
    });
    Route::group(['prefix'=>'/daily'],function(){
        Route::resource('prayer',PrayerController::class);
        Route::post('prayer/status/{id}',[PrayerController::class,'status'])->name('prayer.status');
    });

    /////////////////////////Default routes////////////////////////////////
//Get Data ajax
Route::get('/get/class/{id}', [DefaultController::class,'get_class'])->name('get.class');
Route::get('/get/section/{id}', [DefaultController::class,'get_section'])->name('get.sectoin');
Route::get('/get/subject/{id}', [DefaultController::class,'get_subject'])->name('get.subject');
Route::get('/get/student/{id}', [DefaultController::class,'get_student'])->name('get.student');
Route::get('/get/activity/student/{id}', [DefaultController::class,'get_activity']);
Route::get('/get/attendance/subject/{id}', [DefaultController::class,'get_subject_att']);
/////////////////////////Default routes////////////////////////////////
});
