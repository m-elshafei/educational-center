<?php

use App\Http\Controllers\BranchController;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ManegerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\CourseStudentController;
use Illuminate\Support\Facades\App;

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
// Route::prefix('admin')->middleware('auth', 'admin')->prefix('admin')->group(function () {
//     Route::resource('/', CompanyController::class);
//     Route::resource('/home', CompanyController::class);
//     Route::resource('/company', CompanyController::class);
//     // Route::resource('/category', CategoryController::class);
//     // Route::resource('/classroom', ClassRoomController::class);
//     // Route::resource('/course', CourseController::class);
//     // Route::resource('/course_student', CourseStudentController::class);
//     // Route::resource('/employee', EmployeeController::class);
//     // Route::resource('/maneger', ManegerController::class);
//     // Route::resource('/schedule', ScheduleController::class);
//     // Route::resource('/vendor', VendorController::class);
//     // Route::resource('/branch', BranchController::class);
// });
Route::middleware(['auth'])->group(function () {
    Route::resource('/', CompanyController::class);
    Route::resource('/company', CompanyController::class);
    Route::resource('/branch', BranchController::class);
    Route::resource('/manager', ManegerController::class);
    Route::resource('/category', CategoryController::class);
    // Route::resource('/home', CompanyController::class);
    // Route::resource('/company', CompanyController::class);
    Route::resource('/classroom', ClassRoomController::class);
    Route::resource('/course', CourseController::class);
    Route::resource('/course_student', CourseStudentController::class);
    // Route::resource('/employee', EmployeeController::class);
    // Route::resource('/schedule', ScheduleController::class);
    Route::resource('/vendor', VendorController::class);
    route::get('changelang/{locale}', function ($locale) {
        if (!in_array($locale, ['ar', 'en'])) {
            abort(400);
        };
        session()->put('locale', $locale);
        App::setLocale($locale);
        return redirect()->back();
    })->name('changelang');
});
