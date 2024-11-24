<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index'])->name('user.index');

Route::post('/users/store', [UserController::class, 'store'])->name('user.store');

Route::get('/users/show/{id}', [UserController::class, 'show'])->name('user.show');

Route::put('/users/update/{id}', [UserController::class, 'update'])->name('user.update');

Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

