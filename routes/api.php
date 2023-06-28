<?php

use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CompanyController;
use App\Models\Company;
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