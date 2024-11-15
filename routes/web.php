<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [\App\Http\Controllers\TestController::class, 'index']);


Route::get('/registration', function () {return view('registration');});
Route::post('/registration', [\App\Http\Controllers\RegistrationController::class, 'save']);

Route::get('/authenticate', function () {return view('entrance');});
Route::post('/authenticate', [\App\Http\Controllers\LoginController::class, 'authenticate']);

Route::get('/show/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('show.profile');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
Route::post('/show/profile', [\App\Http\Controllers\ProfileController::class, 'pulse'])->name('pulse');

Route::get('/edit/profile{id}', [\App\Http\Controllers\ProfileController::class, 'index'])->name('edit.profile');
Route::put('/edit/profile{id}', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.update');


Route::get('/loading/file', [\App\Http\Controllers\FileController::class, 'index'])->name('calendar');
Route::post('/trainings/import', [\App\Http\Controllers\FileController::class, 'import'])->name('trainings.import');

Route::get('/my/training', [\App\Http\Controllers\TrainingController::class, 'show']);



