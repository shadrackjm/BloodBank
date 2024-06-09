<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Donor;
use App\Models\User;
use App\Models\BloodGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DonorController extends Controller
{
    

    public function loadHomePage(){
        $user = auth()->user();
        $my_donations = Donation::join('users','users.id','=','donations.user_id')
        ->join('donors','donors.user_id','=','donations.user_id')
        ->where('donations.user_id',$user->id)->limit(5)->get(['users.name','donations.*']);
        return view('donor.home-page',compact('my_donations'));
    }

    public function loadAllDonations(){
        $user = auth()->user();
        $my_donations = Donation::join('users','users.id','=','donations.user_id')
        ->join('donors','donors.user_id','=','donations.user_id')
        ->where('donations.user_id',$user->id)->get(['users.name','donations.*']);
        return view('donor.all-donation',compact('my_donations'));
    }
    public function loadProfile(){
        $donor_details = Donor::join('blood_groups','blood_groups.id','=','donors.blood_group_id')
         ->where('donors.user_id',auth()->user()->id)->first();

        return view('donor.profile',compact('donor_details'));
    }

    public function UpdateProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
        ]);
        try {
                if ($request->file('image')) {
                    $path = $request->file('image')->store('public/images');
                    $user = User::find(auth()->user()->id);
                    $old_image = $user->image;
                    if (!empty($old_image)) {
                        # code...
                        Storage::delete($old_image);
                    }
                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'image' => $path,
                    ]);
                    
                    $update_age = Donor::where('user_id',$user->id)->first();
                    $update_age->update([
                        'age' => $request->age
                    ]);
                    $url = Storage::url($path);
                    return back()->with('success', 'Profile updated successfully')->with('path', $url);
                }else{
                    $user = User::find(auth()->user()->id);
                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email,
                    ]);
                   
                    $update_age = Donor::where('user_id',$user->id)->first();
                    $update_age->update([
                        'age' => $request->age
                    ]);
                    return back()->with('success', 'Profile updated successfully');

                }
        } catch (\Exception $th) {
                    return back()->with('fail', $th->getMessage());
        }
        
    }
    public function UpdatePassword(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        try {
                
                    $user = User::find(auth()->user()->id);
                    $user->update([
                        'password' => Hash::make($request->name),
                    ]);
                    return back()->with('success', 'Password updated successfully');
        } catch (\Exception $th) {
                    return back()->with('fail', $th->getMessage());
        }
        
    }
}
