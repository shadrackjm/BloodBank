<?php

use App\Http\Controllers\LandingPage;
use Illuminate\Support\Facades\Route;



Route::get('/landing',[LandingPage::class,'Landing']);
Route::get('/admin/login',[LandingPage::class,'loadAdminLoginPage']);
Route::get('/admin/dashboard',[LandingPage::class,'loadAdminDashboard']);
Route::get('/admin/donor/list',[LandingPage::class,'loadDonorList']);
Route::get('/blood-groups',[LandingPage::class,'loadBloodGroup']);
Route::get('/blood-bank',[LandingPage::class,'loadBloodBank']);
Route::get('/blood-requests',[LandingPage::class,'loadBloodRequests']);
Route::get('/blood-stock',[LandingPage::class,'loadBloodStock']);
Route::get('/manage-users',[LandingPage::class,'loadUsers']);
