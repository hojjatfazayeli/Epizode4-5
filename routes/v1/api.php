<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/product/store',[\App\Http\Controllers\ProductController::class,'store']);
Route::get('/product/{product}/show',[\App\Http\Controllers\ProductController::class,'show']);
Route::put('/product/{product}/update',[\App\Http\Controllers\ProductController::class,'update']);
Route::delete('/product/{product}/destroy',[\App\Http\Controllers\ProductController::class,'destroy']);
Route::post('/admin/store',[\App\Http\Controllers\AdminController::class,'store']);

Route::middleware('auth:sanctum')->group( function () {
    Route::get('/admin/{admin}/show',[\App\Http\Controllers\AdminController::class,'show']);

});
