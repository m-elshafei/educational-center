<?php

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::post('/login', 'ApiController@login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', 'ApiController@me');
});
