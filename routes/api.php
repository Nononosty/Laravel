<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CopyControllerApi;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\EditionControllerApi;
use App\Http\Controllers\LendingControllerApi;

Route::post('/login', [AuthController::class, 'login']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request){
//    return $request->user();
//});

//Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/copy', [CopyControllerApi::class, 'index']);
    Route::get('/user', function (Request $request){
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/edition', [EditionControllerApi::class, 'index']);
Route::get('/edition/{id}', [EditionControllerApi::class, 'show']);

//Route::middleware('auth:sanctum')->get('/copy', [CopyControllerApi::class, 'index']);
//////Route::get('/copy', [CopyControllerApi::class, 'index']);
Route::get('/copy/{id}', [CopyControllerApi::class, 'show']);

Route::get('/lending', [LendingControllerApi::class, 'index']);
Route::get('/lending/{id}', [LendingControllerApi::class, 'show']);




