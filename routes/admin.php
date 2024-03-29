<?php

use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FeesController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\HomeworkController;
use App\Http\Controllers\Admin\HrController;
use App\Http\Controllers\Admin\ImproveStudentsController;
use App\Http\Controllers\Admin\ImproveTeacherController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\PrayerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StudentActivity;
use App\Http\Controllers\Admin\StudentActivityController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherAttenController;
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

    // Class route here
    Route::group(['prefix' => '/academic'], function () {
        Route::resource('class', ClassController::class);
        Route::post('/class/status/{id}', [ClassController::class, 'status'])->name('class.status');
    });
  
    // Student management route
    Route::group(['prefix' => '/student-info'], function () {
        Route::resource('student', StudentController::class);
        Route::post('/student/status/{id}', [StudentController::class, 'status'])->name('student.status');
        /////////////////////Student Activity LIst/////////////////////////
        Route::get('/student/activity/index', [StudentController::class, 'activityIndex'])->name('activity_index');
        Route::post('/student/activity/store', [StudentController::class, 'activityStore'])->name('activity_store');
        Route::post('/student/activity/update/{id}', [StudentController::class, 'activityUpdate'])->name('activity.update');
        Route::post('/student/activity/destroy/{id}', [StudentController::class, 'activityDelete'])->name('activity.delete');
        Route::post('/student/activity/status/{id}', [StudentController::class, 'activityStatus'])->name('activity.status');
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
        Route::post('attendance/update', [AttendanceController::class,'atten_update'])->name('attenUpdate');
        
    });
    // attendance route
    Route::group(['prefix' => '/teacher'], function () {
        Route::resource('teacheratten', TeacherAttenController::class);
        Route::get('attendance/sheet/{date}', [TeacherAttenController::class,'atten_show'])->name('teacher.atten.show');
        Route::get('attendance/delete/{date}', [TeacherAttenController::class,'atten_delete'])->name('teacher.atten.delete');
        Route::post('attendance/update', [TeacherAttenController::class,'atten_update'])->name('teacher.attenUpdate');
        // Exort Attendance route
        Route::get('/class', [TeacherAttenController::class,'allClass'])->name('teacher.atten.export.class');
        Route::get('/teacher/sheet/{class}', [TeacherAttenController::class,'allTeacherSheet'])->name('allteacher.atten.export.show');
        Route::get('/teacher/attendance/export/pdf', [TeacherAttenController::class,'exportPdf'])->name('teacher.export.attendance');
        Route::get('/teacher/attendance/list/{id}', [TeacherAttenController::class,'oneTeacherlist'])->name('oneteacher.atten.export.show');

        
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
        Route::resource('improve',ImproveStudentsController::class);
        
        // Route::get('homework/destroy/{id}',[ImproveStudentsController::class,'homeworkdestroy'])->name('homework.destroy');
        
    });
    Route::group(['prefix'=>'/teacher'],function(){
        Route::resource('imteacher',ImproveTeacherController::class);
        
        // Route::get('homework/destroy/{id}',[ImproveStudentsController::class,'homeworkdestroy'])->name('homework.destroy');
        
    });
    Route::group(['prefix'=>'/teacher'],function(){
        
        Route::get('responsibility/index/',[TeacherController::class,'responsIndex'])->name('respons.index');
        Route::get('responsibility/create/',[TeacherController::class,'responsCreate'])->name('respons.create');
        Route::post('responsibility/store/',[TeacherController::class,'responsStore'])->name('respons.store');
        Route::get('responsibility/edit/{id}',[TeacherController::class,'responsEdit'])->name('respons.edit');
        Route::post('responsibility/update/{id}',[TeacherController::class,'responsUpdate'])->name('respons.update');
        Route::get('responsibility/delete/{id}',[TeacherController::class,'responsDelete'])->name('respons.delete');
        
    });
//Daily Report route
    Route::group(['prefix'=>'/student'],function(){
      
        Route::get('submit/report/index',[StudentActivityController::class,'reportIndex'])->name('report.index');
        Route::get('/report/show/{id}',[StudentActivityController::class,'reportShow'])->name('report.show');
        Route::get('submit/report/complete',[StudentActivityController::class,'reportComplete'])->name('report.complete');

        Route::post('/report/status/{id}',[StudentActivityController::class,'reportStatus'])->name('report.status');
        
    });
//Student Activity route
    Route::group(['prefix'=>'/student'],function(){
        Route::resource('activity',StudentActivityController::class);
        Route::get('/activity/delete/{id}',[StudentActivityController::class,'actidelete'])->name('activity.delete');
        Route::get('/average/activity/',[StudentActivityController::class,'averageActivity'])->name('average.activity');

        Route::get('activity/sheet/{class}/{date}', [StudentActivityController::class,'activity_show'])->name('activity_show');
        Route::get('activity/delete/{class}/{date}', [StudentActivityController::class,'activity_delete'])->name('activity_delete');

    });
    Route::group(['prefix'=> '/site'],function(){
        Route::resource('setting',SettingController::class);
        Route::post('setting/update/{id}',[SettingController::class,'updateid'])->name('setting.update.data');
    });
    Route::group(['prefix'=> '/parent'],function(){
        Route::resource('parent',ParentController::class);
        Route::post('/status/{id}',[ParentController::class,'status'])
            ->name('parent.status');
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
    // Student Fees Collection
    Route::group(['prefix'=>'/student'],function(){
        Route::resource('fees',FeesController::class);
        Route::get('/fees/partial/edit/{id}',[FeesController::class,'partialEdit'])->name('fees.partial.edit');
        Route::post('/fees/partial/update/{id}',[FeesController::class,'partialUpdate'])->name('fees.partial.update');
        Route::get('/fees/payment/invoice/{id}',[FeesController::class,'feesPaymentInvoice'])->name('fees.payment.invoice');
    });
    Route::post('search/student/result/',[SearchController::class,'studentSearc'])->name('search');

    /////////////////////////Default routes////////////////////////////////
//Get Data ajax
Route::get('/get/class/{id}', [DefaultController::class,'get_class'])->name('get.class');

Route::get('/get/studentlist/{id}', [DefaultController::class,'studentGet'])->name('get.student');
Route::get('/get/student/{id}', [DefaultController::class,'get_student'])->name('get.student');
Route::get('/get/activity/student/{id}', [DefaultController::class,'get_activity']);
Route::get('/get/attendance/subject/{id}', [DefaultController::class,'get_subject_att']);
/////////////////////////Default routes////////////////////////////////
});
