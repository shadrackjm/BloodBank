<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BloodBankController extends Controller
{
    public function loadHomePage(){
        return view('blood-bank.home');
    }
}
