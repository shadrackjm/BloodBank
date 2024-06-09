<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class LandingPage extends Controller
{
    public function Landing(){
        $all_donors = Donor::join('users','users.id','=','donors.user_id')
        ->join('blood_groups','blood_groups.id','=','donors.blood_group_id')
        ->get(['donors.*','users.name','users.image','users.email','blood_groups.name as blood_group']);
        return view('landing',compact('all_donors'));
    }
   
}
