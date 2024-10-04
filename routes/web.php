<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\TrainerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    //admin controller for trainer
    Route::get('/add/trainer', [AdminController::class, 'AddTrainer'])->name('add.trainer');
    Route::post('/store/trainer', [AdminController::class, 'StoreTrainer'])->name('store.trainer');
    Route::get('/edit/trainer/{id}', [AdminController::class, 'EditTrainer'])->name('edit.trainer');
    Route::post('/update/trainer', [AdminController::class, 'UpdateTrainer'])->name('update.trainer');
    Route::get('/delete/trainer/{id}', [AdminController::class, 'DeleteTrainer'])->name('delete.trainer');

    //class controller for admin
    Route::get('/add/class', [AdminController::class, 'AddClass'])->name('add.class');
    Route::post('/store/class', [AdminController::class, 'StoreClass'])->name('store.class');
    Route::get('/edit/class/{id}', [AdminController::class, 'EditClass'])->name('edit.class');
    Route::post('/update/class', [AdminController::class, 'UpdateClass'])->name('update.class');
    Route::get('/delete/class/{id}', [AdminController::class, 'DeleteClass'])->name('delete.class');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');










   // Route::get('/all/trainer', [AdminController::class, 'AllTrainer'])->name('all.trainer');


});//end admin group middleware
Route::middleware(['auth','role:trainer'])->group(function(){

    Route::get('/trainer/dashboard', [TrainerController::class, 'TrainerDashboard'])->name('trainer.dashboard');
    Route::get('/trainer/logout', [TrainerController::class, 'TrainerLogout'])->name('trainer.logout');

});

Route::middleware(['auth','role:trainee'])->group(function(){
    
    Route::get('/trainee/dashboard', [TraineeController::class, 'TraineeDashboard'])->name('trainee.dashboard');
    Route::get('/edit/trainee/{id}', [TraineeController::class, 'EditTrainee'])->name('edit.trainee');
    Route::post('/update/trainee', [TraineeController::class, 'UpdateTrainee'])->name('update.trainee');
    Route::get('/trainee/logout', [TraineeController::class, 'TraineeLogout'])->name('trainee.logout');
    Route::get('/delete/trainee/{id}', [TraineeController::class, 'DeleteTrainee'])->name('delete.trainee');
//booking route
    Route::get('/add/booking', [TraineeController::class, 'AddBooking'])->name('add.booking');
    Route::post('/store/booking', [TraineeController::class, 'StoreBooking'])->name('store.booking');
    Route::get('/edit/booking/{id}', [TraineeController::class, 'EditBooking'])->name('edit.booking');
    Route::post('/update/booking', [TraineeController::class, 'UpdateBooking'])->name('update.booking');
    Route::get('/delete/booking/{id}', [TraineeController::class, 'DeleteBooking'])->name('delete.booking');









});




require __DIR__.'/auth.php';
