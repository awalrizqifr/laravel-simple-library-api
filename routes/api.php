<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('books', BookController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('transactions', TransactionController::class);
