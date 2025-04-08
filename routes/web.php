<?php

use App\Http\Controllers\CopyController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\LoginController;
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

Route::get('/copy/create', [CopyController::class, 'create'])->middleware('auth');
Route::post('/copy', [CopyController::class, 'store']);
Route::get('/copy/edit/{id}', [CopyController::class, 'edit'])->middleware('auth');
Route::post('/copy/update/{id}', [CopyController::class, 'update'])->middleware('auth');
Route::get('/copy/destroy/{id}', [CopyController::class, 'destroy'])->middleware('auth');

Route::get('/copy', [CopyController::class, 'index']);
Route::get('/copy/{id}', [CopyController::class, 'show']);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);
Route::get('/error', function(){
    return view('error', ['message' => session('message')]);
});

Route::get('lending/create/{copyId?}', [LendingController::class, 'create'])->middleware('auth');
Route::post('/lending/store', [LendingController::class, 'store']);
Route::get('/lending/all', [LendingController::class, 'allLendings'])->name('lendings.all')->middleware('auth');

Route::get('/lending', [LendingController::class, 'userLendings'])->middleware('auth');
