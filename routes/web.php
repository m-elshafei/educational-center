<?php

use App\Models\Branch;
use App\Models\Contact;
use App\Models\Employee;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ManegerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\CourseStudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
    {
        Route::resource('/', CompanyController::class);
        Route::resource('/company', CompanyController::class);
        Route::resource('/branch', BranchController::class);
        Route::resource('/manager', ManegerController::class);
        Route::resource('/category', CategoryController::class);
        Route::resource('/classroom', ClassRoomController::class);
        Route::resource('/course', CourseController::class);
        Route::resource('/course_student', CourseStudentController::class);
        Route::resource('/vendor', VendorController::class);
        Route::resource('/contact',ContactController::class);
        Route::resource('/employee',EmployeeController::class);
        Route::resource('/schedule',ScheduleController::class);
        route::get('changelang/{locale}', function ($locale) {
            if (!in_array($locale, ['ar', 'en'])) {
                abort(400);
            };
            session()->put('locale', $locale);
            App::setLocale($locale);
            return redirect()->back();
        })->name('changelang');
    });

});
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

// routes/web.php

// Route::group(['prefix' => LaravelLocalization::setLocale()], function()
// {
// 	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
// 	Route::get('/', function()
// 	{
// 		return View::make('hello');
// 	});

// 	Route::get('test',function(){
// 		return View::make('test');
// 	});
// });

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

Route::get('/auth/facebook', [SocialiteController::class, 'RedirectToFacebook'])->name('facebook');
Route::get('/auth/facebook/callback',  [SocialiteController::class, 'handleFacebookCallback']);


Route::get('/auth/google', [SocialiteController::class, 'RedirectToGoogle'])->name('google');
Route::get('/auth/google/callback',  [SocialiteController::class, 'handleGoogleCallback']);


Route::post('/telegram/webhook', [TelegramController::class, 'handleWebhook']);
Route::get('/telegram/send-message', [TelegramController::class, 'sendMessage']);