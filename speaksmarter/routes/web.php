<?php

use App\Http\Controllers\DashboardController;

//No Auth Routes
Route::get('/', [DashboardController::class , 'index']);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])
         ->group(function () {
            //Auth Routes
             Route::get('/dashboard',[DashboardController::class , 'dashboard'])->name('dashboard');
         });
