<?php

use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FeesController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\HomeworkController;
use App\Http\Controllers\Admin\ImproveTeacherController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StudentActivity;
use App\Http\Controllers\Admin\StudentActivityController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherAttenController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\DefaultController\DefaultController;
use App\Http\Controllers\Backend\AchievementController;
use App\Http\Controllers\Backend\CampusController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\ProgramController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Masjid\GalleryController as MasjidGalleryController;
use App\Http\Controllers\Masjid\PrayerController;
use App\Http\Controllers\Masjid\ServiceController;
use App\Http\Controllers\Masjid\SliderController as MasjidSliderController;
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
        Route::get('/admin/edit/{admin}', 'edit')->name('edit');
        Route::put('/admin/update/{admin}', 'update')->name('update');
        Route::get('/admin/destroy/{admin}', 'destroy')->name('destroy');
        //Admin update profile route
        Route::get('/profile', 'getProfile')->name('profile');
        Route::post('/admin/update/{admin}', 'updateProfile')->name('profile.update');
        Route::get('/edit/password/', 'cPassword')->name('epassword');
        Route::post('/update/password/{admin}', 'upassword')->name('upassword');
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
        //Student Promotion route
        Route::get('promotion/index', 'promotionIndex')->name('students.promotion');
        Route::post('promotion/store', 'promoteStore')->name('student.promotion.store');
    });
    Route::controller(ImproveTeacherController::class)->prefix('/teacher')->group(function(){
        Route::get('promotion/index', 'index')->name('teacher.promotion');
        Route::put('promotion/update/{teacher}','promoteUpdate')->name('teacher.promotion.update');
    });
    Route::controller(TeacherController::class)->prefix('/teacher')->group(function(){
        Route::get('responsibility/index/','responsIndex')->name('respons.index');
        Route::get('responsibility/create/','responsCreate')->name('respons.create');
        Route::post('responsibility/store/','responsStore')->name('respons.store');
        Route::get('responsibility/edit/{teacherResponsibility}','responsEdit')->name('respons.edit');
        Route::put('responsibility/update/{teacherResponsibility}','responsUpdate')->name('respons.update');
        Route::get('responsibility/delete/{teacherResponsibility}','responsDelete')->name('respons.delete');
        Route::post('responsibility/status/{teacherResponsibility}','responsStatus')->name('respons.status');

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

    Route::controller(ParentController::class)->prefix('/parent')->group(function(){
        Route::get('/index', 'index')->name('parent.index');
        Route::get('/create', 'create')->name('parent.create');
        Route::post('/store', 'store')->name('parent.store');
        Route::get('/show/{user}', 'show')->name('parent.show');
        Route::get('/edit/{user}', 'edit')->name('parent.edit');
        Route::put('/update/{user}', 'update')->name('parent.update');
        Route::get('/destroy/{user}', 'destroy')->name('parent.destroy');
    });
    Route::controller(ContactController::class)->prefix('/contact-message')->group(function(){
        Route::get('/index', 'index')->name('message.index');
        Route::get('/show/{contact}', 'show')->name('message.show');
        Route::get('/destroy/{contact}', 'destroy')->name('message.destroy');
    });

    // Student Fees Collection
    Route::controller(FeesController::class)->prefix('/student')->group(function(){
        Route::get('fees/index', 'index')->name('fees.index');
        Route::get('fees/create', 'create')->name('fees.create');
        Route::post('fees/store', 'store')->name('fees.store');
        Route::get('fees/show/{fees}', 'show')->name('fees.show');
        // Route::resource('fees',FeesController::class);
        Route::get('/fees/partial/edit/{fees}', 'partialEdit')->name('fees.partial.edit');
        Route::post('/fees/partial/update/{fees}', 'partialUpdate')->name('fees.partial.update');
        Route::get('/fees/payment/invoice/{fees}', 'feesPaymentInvoice')->name('fees.payment.invoice');
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
    Route::controller(SettingController::class)->group(function(){
        Route::get('/website/setting', 'index')->name('setting.index');
        Route::post('/website/setting/update/{setting?}', 'update')->name('setting.updateSettingData');
    });
    Route::controller(AboutController::class)->group(function(){
        Route::get('/website/about-us', 'index')->name('about.index');
        Route::post('/website/about-us/update/{aboutMadrasha?}', 'update')->name('about.updateData');
    });

    /////////////////////////Masjid routes////////////////////////////////
    Route::controller(MasjidSliderController::class)->group(function(){
        Route::get('/masjid/slider/index', 'index')->name('masjid.slider.index');
        Route::post('/masjid/slider/store', 'store')->name('masjid.slider.store');
        Route::post('/masjid/slider/update/{masjidSlider}', 'update')->name('masjid.slider.update');
        Route::get('/masjid/slider/destroy/{masjidSlider}', 'destroy')->name('masjid.slider.destroy');
        Route::post('/masjid/slider/status/{masjidSlider}', 'status')->name('masjid.slider.status');
    });
    Route::controller(AboutController::class)->group(function(){
        Route::get('/masjid/about-us', 'Masjidindex')->name('masjid.about.index');
        Route::post('/masjid/about-us/update/{aboutMasjid?}', 'Masjidupdate')->name('masjid.about.updateData');
    });
    Route::controller(PrayerController::class)->group(function(){
        Route::get('/masjid/prayer', 'index')->name('prayer.index');
        Route::post('/masjid/prayer/update/{prayer?}', 'update')->name('prayer.updatePrayerData');
    });
    Route::controller(ServiceController::class)->group(function(){
        Route::get('/service/index', 'index')->name('service.index');
        Route::get('/service/create', 'create')->name('service.create');
        Route::post('/service/store', 'store')->name('service.store');
        Route::get('/service/edit/{service}', 'edit')->name('service.edit');
        Route::put('/service/update/{service}', 'update')->name('service.update');
        Route::get('/service/destroy/{service}', 'destroy')->name('service.destroy');
        Route::post('/service/status/{service}', 'status')->name('service.status');
    });
    Route::controller(MasjidGalleryController::class)->as('masjid.')->group(function(){
        Route::get('/masjid/gallery/index', 'index')->name('gallery.index');
        Route::post('/masjid/gallery/store', 'store')->name('gallery.store');
        Route::post('/masjid/gallery/update/{masjidGallery}', 'update')->name('gallery.update');
        Route::get('/masjid/gallery/destroy/{masjidGallery}', 'destroy')->name('gallery.destroy');
        Route::post('/masjid/gallery/status/{masjidGallery}', 'status')->name('gallery.status');
    });
    /////////////////////////Default routes////////////////////////////////
//Get Data ajax
// Route::get('/get/class/{id}', [DefaultController::class,'get_class'])->name('get.class');
//ajax for student fees
Route::get('/get/studentlist/{id}', [DefaultController::class,'studentGet']);
//ajax for student attendance
Route::get('/get/student/{id}', [DefaultController::class,'geStudent']);
//ajax for get group data
Route::get('/get/group/{id}', [DefaultController::class,'getGroup']);
Route::get('/get/activity/student/{id}', [DefaultController::class,'get_activity']);
/////////////////////////Default routes////////////////////////////////
});
