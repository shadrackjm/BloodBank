<?php

use App\Http\Controllers\LandingPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\BloodBankController;

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

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
    Route::get('/dashboard', [AdminController::class, 'loadAdminDashboard']);
    Route::get('/blood-groups', [AdminController::class, 'loadBloodGroup']);
    Route::get('/blood-bank', [AdminController::class, 'loadBloodBank']);
    Route::get('/blood-requests', [AdminController::class, 'loadBloodRequests']);
    Route::get('/manage-users', [AdminController::class, 'loadUsers']);
    
    // Blood groups
    Route::get('/load-blood-group-form', [AdminController::class, 'loadAddBlood']);
    Route::post('/add-blood-group', [AdminController::class, 'addBloodGroup'])->name('admin.add-blood-group');
    Route::get('/delete-blood-group/{id}', [AdminController::class, 'deleteBloodGroup']);
    Route::get('/edit-blood-group/{id}', [AdminController::class, 'loadEditBloodGroup']);
    Route::post('/edit-blood-group', [AdminController::class, 'editBloodGroup'])->name('admin.edit-blood-group');
    
    // Blood banks
    Route::get('/load-blood-bank-form', [AdminController::class, 'loadAddBloodBank']);
    Route::post('/add-blood-bank', [AdminController::class, 'addBloodBank'])->name('admin.add-blood-bank');
    Route::get('/delete-blood-bank/{id}', [AdminController::class, 'deleteBloodBank']);
    Route::get('/edit-blood-bank/{id}', [AdminController::class, 'loadEditBloodBank']);
    Route::post('/edit-blood-bank', [AdminController::class, 'editBloodBank'])->name('admin.edit-blood-bank');
    
    // Blood bank stock
    Route::get('/blood-stock', [AdminController::class, 'loadBloodStock']);
    Route::get('/load-blood-bank-stock-form', [AdminController::class, 'loadAddBloodBankStock']);
    Route::post('/add-blood-bank-stock', [AdminController::class, 'addBloodBankStock'])->name('admin.add-blood-bank-stock');
    Route::get('/delete-blood-bank-stock/{id}', [AdminController::class, 'deleteBloodBankStock']);
    Route::get('/edit-blood-bank-stock/{id}', [AdminController::class, 'loadEditBloodBankStock']);
    Route::post('/edit-blood-bank-stock', [AdminController::class, 'editBloodBankStock'])->name('admin.edit-blood-bank-stock');
    
    // Donors
    Route::get('/donor/list', [AdminController::class, 'loadDonorList']);
    Route::get('/load-add-donor', [AdminController::class, 'loadAddDonor']);
    Route::post('/add-donor', [AdminController::class, 'addDonor'])->name('admin.add-donor');
    Route::get('/delete-donor/{id}', [AdminController::class, 'deleteDonor']);
    Route::get('/edit-donor/{id}', [AdminController::class, 'loadEditDonor']);
    Route::post('/edit-donor', [AdminController::class, 'editDonor'])->name('admin.edit-donor');
    
    // Profile
    Route::get('/profile', [AdminController::class, 'loadAdminProfile']);
    Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.update-profile');
    Route::post('/password/update', [AdminController::class, 'updatePassword'])->name('admin.update-password');
});
 

// donor urls
Route::group(['middleware' => 'donor'], function(){
    Route::get('/donor/home',[DonorController::class,'loadHomePage']);
    // profile
    Route::get('/donor/profile',[DonorController::class,'loadProfile']);
    Route::post('/update/profile',[DonorController::class,'UpdateProfile'])->name('donor-update-profile');
    Route::post('/update/password',[DonorController::class,'UpdatePassword'])->name('donor-update-password');
    Route::get('/all/donations',[DonorController::class,'loadAllDonations']);

});
Route::get('/donor/login',[DonorController::class,'loadDonorLoginPage']);
Route::get('/donor/registration',[DonorController::class,'loadDonorRegister']);


Route::get('/register',[AuthController::class,'registerDonor'])->name('registerDonor');

// blood banks routs
Route::group(['middleware' => 'blood_bank'], function(){
    Route::get('/blood-bank/home',[BloodBankController::class,'loadHomePage']);

});

