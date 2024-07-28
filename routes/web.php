<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Core\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('main.main');
})->name('landing-main');


Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'show_login'])->name('login');
    Route::post('/login/handle-login',[AuthController::class,'handle_login'])->name('handle-login');
    Route::get('/register', [AuthController::class, 'show_register'])->name('register');
    Route::post('/register/create', [AuthController::class, 'handle_register'])->name('handle-register');
});

Route::get('/logout',[AuthController::class,'handle_logout'])->name('handle_logout');

Route::middleware(['auth','CheckRole:user'])->prefix('user/{user:username}')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show_dashboard'])->name('show-dashboard');
});

Route::middleware(['auth','CheckRole:admin'])->prefix('admin/{user}')->group(function () {
  
});

