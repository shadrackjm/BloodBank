<?php

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use Illuminate\Http\Request;

class DonorController extends Controller
{
     public function loadDonorLoginPage(){
        return view('donor.login-page');
    }

    public function loadDonorRegister(){
        $blood_groups = BloodGroup::all();
        return view('donor.register',compact('blood_groups'));
    }

    public function loadHomePage(){
        return view('donor.home-page');
    }
}
