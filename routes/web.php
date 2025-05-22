<?php

use App\Http\Controllers\AccessaryController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\GetComputerController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserRegistationController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegistrationController;
use App\Http\Controllers\GetAccessaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelegramController;


Route::get('/comsearch', [ComputerController::class, 'search']);


Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/contact', function () {
    return view('frontend.contactus');
});

// Admin Authentication Routes
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login')->middleware('clear_cookies');
Route::post('/admin/check', [AdminLoginController::class, 'admincheck'])->name('admin.check');
Route::get('/admin/register', [AdminRegistrationController::class, 'create'])->name('admin.register');
Route::post('/admin/register', [AdminRegistrationController::class, 'store'])->name('admin.store');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin', ComputerController::class)->names([
        'index' => 'computer.index',
        'create' => 'computer.create',
        'store' => 'computer.store',
        'show' => 'computer.show',
        'edit' => 'computer.edit',
        'update' => 'computer.update',
        'destroy' => 'computer.destroy',
    ]);
    Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout')->middleware('clear_cookies');
});

Route::get('/computer', [GetComputerController::class, 'getcomputer'])->name('computer.index');
Route::get('/computerdetails/{id}', [GetComputerController::class, 'computerdetails'])->name('computer.details');


Route::get('/login', [UserLoginController::class, 'index'])->name('login')->middleware('clear_cookies');
Route::post('/check', [UserLoginController::class, 'check'])->name('check');
Route::get('/register', [UserRegistationController::class, 'create'])->name('register');
Route::post('/register', [UserRegistationController::class, 'store'])->name('user.register');
//middleware implementation
Route::middleware(['auth', 'user'])->group(function () {

    Route::get('/user/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');
    // Route::get('/records', [RecordViewController::class, 'index'])->name('record.index');
    Route::post('/logout', [UserLoginController::class, 'logout'])->name('user.logout')->middleware('clear_cookies');
});


Route::resource("/accessary", AccessaryController::class);
Route::get('/search', [AccessaryController::class, 'search']);
Route::get('/getaccessary', [GetAccessaryController::class, 'getaccessary'])->name('accessary.index');
Route::get('/accessarydetails/{id}', [GetAccessaryController::class, 'accessarydetails'])->name('accessary.details');

Route::post('/buy-now', [TelegramController::class, 'sendToTelegram'])->name('buy-now');
