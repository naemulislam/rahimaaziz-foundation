<?php

use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FeesController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\GroupController;
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
use App\Http\Controllers\Backend\AchievementController;
use App\Http\Controllers\Backend\CampusController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\ProgramController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\LoginController;
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

Route::prefix('dashboard')->middleware('admin')->name('admin.')->group(function () {
    Route::view('/', 'backend.dashboard.dashboard')->name('dashboard');
    Route::post('/logout', [LoginController::class, 'AdminLogout'])->name('logout');
    Route::controller(ProfileController::class)->group(function(){
        Route::get('/admin', 'index')->name('index');
        Route::post('/admin/store', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/profile', 'getProfile')->name('profile');
        Route::get('/admin/edit/{id}', 'edit')->name('edit');
        Route::post('/admin/update/{id}', 'update')->name('update');
        Route::get('/admin/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/edit/password/', 'cPassword')->name('epassword');
        Route::post('/update/password/', 'upassword')->name('upassword');
    });

    Route::get('filemanager', [FileManagerController::class, 'index'])->name('filemanager.index');

    // Class route here
    Route::prefix('/academic')->controller(GroupController::class)->group(function () {
        Route::get('group/index','index')->name('group.index');
        Route::post('group/store','store')->name('group.store');
        Route::put('group/update/{group}','update')->name('group.update');
        Route::get('group/destroy/{group}','destroy')->name('group.destroy');
        Route::post('group/status/{group}','status')->name('group.status');
    });

    // Student management route
    Route::controller(StudentController::class)->prefix('/student')->group(function () {
        Route::get('registration/index', 'registerIndex')->name('register.index');
        Route::get('registration/admission/{slug}', 'registerAdmissionCreate')->name('registerAdmission.create');
        Route::post('registration/admission/store', 'registerAdmissionStore')->name('registerAdmission.store');
        Route::get('registration/destroy/{student}', 'registerDestroy')->name('register.destroy');

        /////////////////////Student Activity LIst/////////////////////////
        Route::get('daily-activity/index', 'activityIndex')->name('daily_activity.index');
        Route::post('daily-activity/store', 'activityStore')->name('daily_activity.store');
        Route::put('daily-activity/update/{activityList}', 'activityUpdate')->name('daily_activity.update');
        Route::get('daily-activity/destroy/{activityList}', 'activityDelete')->name('daily_activity.destroy');
        Route::post('daily-activity/status/{activityList}', 'activityStatus')->name('daily_activity.status');
    });
    // Student management route
    Route::controller(TeacherController::class)->group( function () {
        Route::get('teacher/index','index')->name('teacher.index');
        Route::get('teacher/create','create')->name('teacher.create');
        Route::post('teacher/store','store')->name('teacher.store');
        Route::get('teacher/show/{slug}','show')->name('teacher.show');
        Route::get('teacher/edit/{slug}','edit')->name('teacher.edit');
        Route::put('teacher/update/{teacher}','update')->name('teacher.update');
        Route::get('teacher/destroy/{teacher}','destroy')->name('teacher.destroy');
        Route::post('/teacher/status/{teacher}', 'status')->name('teacher.status');
    });
    // Student attendance route
    Route::controller(AttendanceController::class)->prefix('/student')->group(function () {
        Route::get('attendance/create', 'create')->name('student.atten.create');
        Route::get('attendance/index', 'index')->name('student.atten.index');
        Route::post('attendance/store', 'store')->name('student.atten.store');
        Route::post('attendance/update', 'update')->name('student.atten.update');
        Route::get('attendance/show/{group}/{date}', 'show')->name('student.atten.show');
        Route::get('attendance/destroy/{group}/{date}', 'destroy')->name('student.atten.destroy');
    });
    // Teacher attendance route
    Route::controller(TeacherAttenController::class)->prefix('/teacher')->group(function () {
        Route::get('attendance/create', 'create')->name('teacher.atten.create');
        Route::get('attendance/index', 'index')->name('teacher.atten.index');
        Route::post('attendance/store', 'store')->name('teacher.atten.store');
        Route::post('attendance/update', 'update')->name('teacher.atten.update');
        Route::get('attendance/show/{date}', 'show')->name('teacher.atten.show');
        Route::get('attendance/destroy/{date}', 'destroy')->name('teacher.atten.destroy');
        // Exort Attendance route
        Route::get('/teacher/attendance/export/pdf', [TeacherAttenController::class,'exportPdf'])->name('teacher.export.attendance');
        Route::get('/teacher/attendance/list/{id}', [TeacherAttenController::class,'oneTeacherlist'])->name('oneteacher.atten.export.show');


    });
    // admission route
    Route::controller(AdmissionController::class)->prefix('/student')->group( function () {
        Route::get('admission/index','index')->name('admission.index');
        Route::get('admission/create','create')->name('admission.create');
        Route::post('admission/store','store')->name('admission.store');
        Route::get('admission/show/{slug}','show')->name('admission.show');
        Route::get('admission/edit/{slug}','edit')->name('admission.edit');
        Route::put('admission/update/{student}','update')->name('admission.update');
        Route::get('admission/destroy/{student}','destroy')->name('admission.destroy');
        Route::post('admission/status/{student}', 'status')->name('admission.status');
        Route::get('admission/pending', 'pendingindex')->name('admission.pending');
        // Route::post('admission/approved/{student}', 'admissionApproved')->name('admission.approved');
        Route::post('admission/payment/status/{student}', 'admissionPaymentStatus')->name('admission.payment.status');
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

    Route::controller(SliderController::class)->group(function(){
        Route::get('/slider/index', 'index')->name('slider.index');
        Route::post('/slider/store', 'store')->name('slider.store');
        Route::post('/slider/update/{slider}', 'update')->name('slider.update');
        Route::get('/slider/destroy/{slider}', 'destroy')->name('slider.destroy');
        Route::post('/slider/status/{slider}', 'status')->name('slider.status');
    });

    Route::controller(NoticeController::class)->group(function(){
        Route::get('/notice/index', 'index')->name('notice.index');
        Route::get('/notice/create', 'create')->name('notice.create');
        Route::post('/notice/store', 'store')->name('notice.store');
        Route::get('/notice/edit/{notice}', 'edit')->name('notice.edit');
        Route::put('/notice/update/{notice}', 'update')->name('notice.update');
        Route::get('/notice/destroy/{notice}', 'destroy')->name('notice.destroy');
        Route::post('/notice/status/{notice}', 'status')->name('notice.status');
    });
    Route::controller(ProgramController::class)->group(function(){
        Route::get('/program/index', 'index')->name('program.index');
        Route::get('/program/create', 'create')->name('program.create');
        Route::post('/program/store', 'store')->name('program.store');
        Route::get('/program/edit/{program}', 'edit')->name('program.edit');
        Route::put('/program/update/{program}', 'update')->name('program.update');
        Route::get('/program/destroy/{program}', 'destroy')->name('program.destroy');
        Route::post('/program/status/{program}', 'status')->name('program.status');
    });
    Route::controller(CampusController::class)->group(function(){
        Route::get('/campuses/index', 'index')->name('campuses.index');
        Route::post('/campuses/store', 'store')->name('campuses.store');
        Route::post('/campuses/update/{campus}', 'update')->name('campuses.update');
        Route::get('/campuses/destroy/{campus}', 'destroy')->name('campuses.destroy');
        Route::post('/campuses/status/{campus}', 'status')->name('campuses.status');
    });
    Route::controller(AchievementController::class)->group(function(){
        Route::get('/achievement/index', 'index')->name('achievement.index');
        Route::get('/achievement/create', 'create')->name('achievement.create');
        Route::post('/achievement/store', 'store')->name('achievement.store');
        Route::get('/achievement/edit/{achievement}', 'edit')->name('achievement.edit');
        Route::put('/achievement/update/{achievement}', 'update')->name('achievement.update');
        Route::get('/achievement/destroy/{achievement}', 'destroy')->name('achievement.destroy');
        Route::post('/achievement/status/{achievement}', 'status')->name('achievement.status');
    });
    Route::controller(NewsController::class)->group(function(){
        Route::get('/news/index', 'index')->name('news.index');
        Route::get('/news/create', 'create')->name('news.create');
        Route::post('/news/store', 'store')->name('news.store');
        Route::get('/news/edit/{news}', 'edit')->name('news.edit');
        Route::put('/news/update/{news}', 'update')->name('news.update');
        Route::get('/news/destroy/{news}', 'destroy')->name('news.destroy');
        Route::post('/news/status/{news}', 'status')->name('news.status');
    });
    Route::controller(GalleryController::class)->group(function(){
        Route::get('/gallery/index', 'index')->name('gallery.index');
        Route::post('/gallery/store', 'store')->name('gallery.store');
        Route::post('/gallery/update/{gallery}', 'update')->name('gallery.update');
        Route::get('/gallery/destroy/{gallery}', 'destroy')->name('gallery.destroy');
        Route::post('/gallery/status/{gallery}', 'status')->name('gallery.status');
    });

    /////////////////////////Default routes////////////////////////////////
//Get Data ajax
// Route::get('/get/class/{id}', [DefaultController::class,'get_class'])->name('get.class');

Route::get('/get/studentlist/{id}', [DefaultController::class,'studentGet'])->name('get.student');
Route::get('/get/student/{id}', [DefaultController::class,'geStudent'])->name('get.student');
Route::get('/get/activity/student/{id}', [DefaultController::class,'get_activity']);
Route::get('/get/attendance/subject/{id}', [DefaultController::class,'get_subject_att']);
/////////////////////////Default routes////////////////////////////////
});
