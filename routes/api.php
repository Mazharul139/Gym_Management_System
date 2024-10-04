<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Trainer\TrainerClassController;
use App\Http\Controllers\Trainee\BookingController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('user/store',[UserController::class,'store']);
//Trainer api
Route::get('/admin/trainers', [TrainerController::class, 'index']);
Route::post('/admin/trainers', [TrainerController::class, 'store']);
Route::put('/admin/trainers/{id}', [TrainerController::class, 'update']);
Route::delete('/admin/trainers/{id}', [TrainerController::class, 'destroy']);
//class api
Route::get('/admin/classes', [ClassController::class, 'index']);
Route::post('/admin/classes', [ClassController::class, 'store']);
//Trainer class
Route::get('/trainer/classes', [TrainerClassController::class, 'index']);
//Booking Class
Route::get('/trainee/bookings', [BookingController::class, 'index']);
Route::post('/trainee/bookings', [BookingController::class, 'store']);
Route::delete('/trainee/bookings/{id}', [BookingController::class, 'destroy']);




