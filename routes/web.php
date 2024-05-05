<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\LandingPage;
use Illuminate\Support\Facades\Route;

Route::get('/forgot/password',[AuthController::class,'forgotPassword']);

Route::post('/forgot',[AuthController::class,'forgot'])->name('forgot');

Route::get('/reset/password',[AuthController::class,'loadResetPassword']);

Route::post('/reset/user/password',[AuthController::class,'ResetPassword'])->name('ResetPassword');

Route::get('/404',[AuthController::class,'load404']);
Route::get('/logout',[AuthController::class,'LogoutUser']);
Route::get('/login',[AuthController::class,'LoginUser'])->name('LoginUser');




Route::get('/',[LandingPage::class,'Landing']);
Route::get('/landing',[LandingPage::class,'Landing']);
Route::get('/admin/login',[AdminController::class,'loadAdminLoginPage']);
Route::get('/admin/dashboard',[AdminController::class,'loadAdminDashboard'])->middleware('admin');
Route::get('/admin/donor/list',[AdminController::class,'loadDonorList'])->middleware('admin');
Route::get('/blood-groups',[AdminController::class,'loadBloodGroup'])->middleware('admin');
Route::get('/blood-bank',[AdminController::class,'loadBloodBank'])->middleware('admin');
Route::get('/blood-requests',[AdminController::class,'loadBloodRequests'])->middleware('admin');
Route::get('/blood-stock',[AdminController::class,'loadBloodStock'])->middleware('admin');
Route::get('/manage-users',[AdminController::class,'loadUsers'])->middleware('admin');

// donor urls
Route::get('/donor/login',[DonorController::class,'loadDonorLoginPage']);
Route::get('/donor/registration',[DonorController::class,'loadDonorRegister']);
Route::get('/donor/home',[DonorController::class,'loadHomePage'])->middleware('donor');
Route::get('/register',[AuthController::class,'registerDonor'])->name('registerDonor');

