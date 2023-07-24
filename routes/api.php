<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/add_post', [AdminController::class, 'add_post']);
    Route::get('/show_post', [AdminController::class, 'show_post']);
    Route::get('/edit_post/{id}', [AdminController::class, 'edit_post']);
    Route::put('/update_post/{id}', [AdminController::class, 'update_post']);
    Route::delete('/delete_post/{id}', [AdminController::class, 'delete_post']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get( '/create_post',[HomeController::class,'create_post']);
    Route::post( '/user_post',[HomeController::class,'user_post']);
    Route::get( '/my_post',[HomeController::class,'my_post']);
    Route::get( '/my_post_delete/{id}',[HomeController::class,'my_post_delete']);
    Route::get( '/post_update_page/{id}',[HomeController::class,'post_update_page']);
    Route::post( '/update_post_data/{id}',[HomeController::class,'update_post_data']);
});