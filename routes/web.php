<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration', function () {return view('registration');});
Route::post('/registration', [\App\Http\Controllers\RegistrationController::class, 'save']);

Route::get('/authenticate', function () {return view('entrance');});
Route::post('/authenticate', [\App\Http\Controllers\LoginController::class, 'authenticate']);

Route::get('/show/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('show.profile');

Route::get('/edit/profile{id}', [\App\Http\Controllers\ProfileController::class, 'index'])->name('edit.profile');
Route::put('/edit/profile{id}', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.update');
