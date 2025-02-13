<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/showEjercicio', [DashboardController::class, 'showEjercicio'])->name('dashboard.showEjercicio');
Route::match(['get', 'post'], '/dashboard/tablas', [DashboardController::class, 'showTables'])->name('dashboard.tablas');
Route::post('/dashboard/tablas', [DashboardController::class, 'showTables'])->name('dashboard.tablas');
