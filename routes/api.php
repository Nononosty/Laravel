<?php

use App\Http\Controllers\CopyControllerApi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditionControllerApi;
use App\Http\Controllers\LendingControllerApi;

Route::get('/edition', [EditionControllerApi::class, 'index']);
Route::get('/edition/{id}', [EditionControllerApi::class, 'show']);

Route::get('/copy', [CopyControllerApi::class, 'index']);
Route::get('/copy/{id}', [CopyControllerApi::class, 'show']);

Route::get('/lending', [LendingControllerApi::class, 'index']);
Route::get('/lending/{id}', [LendingControllerApi::class, 'show']);


