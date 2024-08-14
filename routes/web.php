<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Core\RoomController;
use App\Http\Controllers\Core\DashboardController;
use App\Http\Controllers\Core\AttendanceController;
use App\Http\Controllers\Core\ProfileController;
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


Route::middleware(['auth','CheckRole:user'])->prefix('user/dashboard')->group(function () {
    Route::get('/main', [DashboardController::class, 'show_dashboard'])->name('show-dashboard');
    Route::prefix('rooms')->group(function () {
        Route::get('/', [RoomController::class, 'show_room'])->name('show-rooms');
        Route::get('/create', [RoomController::class, 'show_create_room'])->name('create-room'); 
        Route::post('/create/handle-create', [RoomController::class, 'create'])->name('handle-create'); 
        Route::get('/my-rooms', [RoomController::class, 'show_my_room'])->name('show-myrooms');
        Route::get('/my-rooms/{room}', [RoomController::class, 'show_myroom_details'])->name('show-myrooms-details');
        Route::get('/joined-rooms', [RoomController::class, 'show_joined_room'])->name('show-joinedrooms');
        Route::get('/joined-rooms/{room}', [RoomController::class, 'show_joined_room_details'])->name('show-joinedrooms-details');
        Route::post('/joined-rooms/enroll', [RoomController::class, 'enroll_room'])->name('handle-enroll');
        Route::get('/my-rooms/{room}/members', [RoomController::class, 'show_member_room'])->name('show-member-room');
    });

    Route::prefix('attendance')->group(function () {
        Route::get('/', [AttendanceController::class, 'show_attendance_main'])->name('show-attendance');
        Route::post('/create', [AttendanceController::class, 'create'])->name('handle-create-attendance');
        Route::post('/edit/{attendance}', [AttendanceController::class, 'create'])->name('');
        Route::get('/admin/{attendance}/details', [AttendanceController::class, 'show_details_attendanceAdmin'])->name('show-attendance-admin-details');
        Route::get('/user/{attendance}/details', [AttendanceController::class, 'show_details_attendanceUser'])->name('show-attendance-user-details');
        Route::post('/user/{attendance}/enroll', [AttendanceController::class, 'enroll_attendace'])->name('handle-enroll-attendance');
        Route::get('/admin/{attendance}/details/{enroll}', [AttendanceController::class, 'show_user_details_attendance'])->name('show-attendance-enroll-details');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/',[ProfileController::class,'show_profile'])->name('show-profile');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile-update');
        Route::get('/{user}/details',[ProfileController::class,'show_users_profile'])->name('show-users-profile');
    });

    Route::prefix('todo')->group(function () {
        Route::get('/', function () {
            return view('dashboard.core.todo.todo');
        })->name('show-todo');
     
    });
    
  
});

Route::middleware(['auth','CheckRole:admin'])->prefix('admin/{user}')->group(function () {
  
});

