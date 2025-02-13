<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Ruta para la vista principal del dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Permitir tanto GET como POST en la ruta para mostrar tablas
Route::match(['get', 'post'], '/dashboard/tablas', [DashboardController::class, 'showTables'])->name('dashboard.tablas');

