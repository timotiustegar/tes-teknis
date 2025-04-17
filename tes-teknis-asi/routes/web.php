<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Redis;

Route::get('/clients', [ClientController::class, 'index'])->name('index');
Route::get('/create-client', [ClientController::class, 'create'])->name('create-client');
Route::post('/clients', [ClientController::class, 'store'])->name('store-client');
Route::get('/check-redis', [ClientController::class, 'checkRedis'])->name('check-redis');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('destroy-client');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('edit-client');
Route::post('/clients/{id}', [ClientController::class, 'update'])->name('update-client');