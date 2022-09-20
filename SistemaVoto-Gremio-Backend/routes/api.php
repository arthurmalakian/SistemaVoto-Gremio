<?php

use App\Http\Controllers\PlatesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\VotingPeriodController;
use Illuminate\Http\Request;
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

Route::apiResource('/students',StudentsController::class);
Route::apiResource('/plates',PlatesController::class);

Route::get('/voting-period',[VotingPeriodController::class,'index']);
Route::get('/voting-period/{id}',[VotingPeriodController::class,'show']);
Route::get('/voting-period-last',[VotingPeriodController::class,'last']);
Route::post('/voting-period-open',[VotingPeriodController::class,'open']);
Route::post('/voting-period-close',[VotingPeriodController::class,'close']);

