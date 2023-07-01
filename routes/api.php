<?php

use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ClassRoomController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ManagerController;
use App\Http\Controllers\Api\VendorController;
use App\Http\Controllers\Api\CourseStudentController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/login', function (Request $request) {
//     return $request->user();
// });

// Route::post('/login', 'ApiController@login');

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/me', 'ApiController@me');
// });
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
Route::get('/company', [CompanyController::class, 'index']);
Route::get('/company/{id}', [CompanyController::class, 'show']);
Route::post('/company', [CompanyController::class, 'store']);
Route::post('/company/{id}', [CompanyController::class, 'update']);
Route::post('/company/del/{id}', [CompanyController::class, 'destroy']);

Route::get('/branch', [BranchController::class, 'index']);
Route::get('/branch/{id}', [BranchController::class, 'show']);
Route::post('/branch', [BranchController::class, 'store']);
Route::post('/branch/{id}', [BranchController::class, 'update']);
Route::post('/branch/del/{id}', [BranchController::class, 'destroy']);

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::post('/category', [CategoryController::class, 'store']);
Route::post('/category/{id}', [CategoryController::class, 'update']);
Route::post('/category/del/{id}', [CategoryController::class, 'destroy']);

Route::get('/manager', [ManagerController::class, 'index']);
Route::get('/manager/{id}', [ManagerController::class, 'show']);
Route::post('/manager', [ManagerController::class, 'store']);
Route::post('/manager/{id}', [ManagerController::class, 'update']);
Route::post('/manager/del/{id}', [ManagerController::class, 'destroy']);

Route::get('/vendor', [VendorController::class, 'index']);
Route::get('/vendor/{id}', [VendorController::class, 'show']);
Route::post('/vendor', [VendorController::class, 'store']);
Route::post('/vendor/{id}', [VendorController::class, 'update']);
Route::post('/vendor/del/{id}', [VendorController::class, 'destroy']);

Route::get('/class', [ClassRoomController::class, 'index']);
Route::get('/class/{id}', [ClassRoomController::class, 'show']);
Route::post('/class', [ClassRoomController::class, 'store']);
Route::post('/class/{id}', [ClassRoomController::class, 'update']);
Route::post('/class/del/{id}', [ClassRoomController::class, 'destroy']);

Route::get('/course', [CourseController::class, 'index']);
Route::get('/course/{id}', [CourseController::class, 'show']);
Route::post('/course', [CourseController::class, 'store']);
Route::post('/course/{id}', [CourseController::class, 'update']);
Route::post('/course/del/{id}', [CourseController::class, 'destroy']);

Route::get('/student', [CourseStudentController::class, 'index']);
Route::get('/student/{id}', [CourseStudentController::class, 'show']);
Route::post('/student', [CourseStudentController::class, 'store']);
Route::post('/student/{id}', [CourseStudentController::class, 'update']);
Route::post('/student/del/{id}', [CourseStudentController::class, 'destroy']);

Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/{id}', [EmployeeController::class, 'show']);
Route::post('/employee', [EmployeeController::class, 'store']);
Route::post('/employee/{id}', [EmployeeController::class, 'update']);
Route::post('/employee/del/{id}', [EmployeeController::class, 'destroy']);

Route::get('/schedule', [ScheduleController::class, 'index']);
Route::get('/schedule/{id}', [ScheduleController::class, 'show']);
Route::post('/schedule', [ScheduleController::class, 'store']);
Route::post('/schedule/{id}', [ScheduleController::class, 'update']);
Route::post('/schedule/del/{id}', [ScheduleController::class, 'destroy']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user', [UserController::class, 'store']);
Route::patch('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);
