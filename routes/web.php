<?php

use App\Http\Controllers\CopyController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello world!']);
});

Route::get('/edition', [EditionController::class, 'index']);
Route::get('/edition/{id}', [EditionController::class, 'show']);

Route::get('/copy/create', [CopyController::class, 'create']);
Route::post('/copy', [CopyController::class, 'store']);
Route::get('/copy/edit/{id}', [CopyController::class, 'edit']);
Route::post('/copy/update/{id}', [CopyController::class, 'update']);
Route::get('/copy/destroy/{id}', [CopyController::class, 'destroy']);

Route::get('/copy', [CopyController::class, 'index']);
Route::get('/copy/{id}', [CopyController::class, 'show']);

Route::get('/user/{id}', [UserController::class, 'show']);


