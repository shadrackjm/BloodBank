<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function loadAdminLoginPage(){
        return view('admin.login');
    }

    public function loadAdminDashboard(){
        return view('admin.dashboard');
    }
    public function loadDonorList(){
        return view('admin.donor-list');
    }

    public function loadBloodGroup(){
        return view('admin.blood-group');
    }

    public function loadBloodBank(){
        return view('admin.blood-bank');
    }

    public function loadBloodRequests(){
        return view('admin.blood-requests');
    }

    public function loadBloodStock(){
        return view('admin.stock');
    }

    public function loadUsers(){
        return view('admin.users');
    }
}
