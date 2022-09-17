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
    Route::get('/admission/get/class/{id}', [DefaultController::class,'get_class'])->name('get.class');
    /////End

});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::view('/', 'backend.dashboard.dashboard')->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'getProfile'])->name('user.profile');
    Route::get('/user/edit/{id}', [ProfileController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [ProfileController::class, 'update'])->name('user.update');
    Route::get('/edit/password/', [ProfileController::class, 'cPassword'])->name('user.epassword');
    Route::post('/update/password/', [ProfileController::class, 'upassword'])->name('user.upassword');
    //  Route::post('/logout', [AllAuthController::class, 'userlogout'])->name('logout');

    // Route::resource('user', UserController::class);

    // Route::get('edit-profile', [UserController::class, 'editProfile'])->name('edit.profile');
    // Route::get('change_password', [UserController::class, 'change_password'])->name('change_password');
    // Route::get('settings/company_settings', [SettingController::class, 'editCompanySetting'])->name('company.edit');
    // Route::post('settings/company_setting', [SettingController::class, 'updateCompanySetting'])->name('company.update');




    // // Role Permission
    // Route::resource('developer/permission', PermissionController::class)->only('index', 'store');
    // Route::get('role/assign', [RoleController::class, 'roleAssign'])->name('role.assign');
    // Route::post('role/assign', [RoleController::class, 'storeAssign'])->name('store.assign');
    // Route::resource('role', RoleController::class);

    // Route::delete('remove-media/{media}', function (MediaAlias $media) {
    //     $media->delete();
    //     return back()->with('success', 'Media successfully deleted.');
    // })->name('remove-media');
});
