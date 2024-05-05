<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonorController extends Controller
{
     public function loadDonorLoginPage(){
        return view('donor.login-page');
    }

    public function loadDonorRegister(){
        return view('donor.register');
    }

    public function loadHomePage(){
        return view('donor.home-page');
    }
}
