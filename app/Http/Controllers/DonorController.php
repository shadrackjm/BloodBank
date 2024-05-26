<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BloodGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
    public function loadProfile(){
        return view('donor.profile');
    }

    public function UpdateProfile(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        try {
                if ($request->file('image')) {
                    $path = $request->file('image')->store('public/images');
                    $user = User::find(auth()->user()->id);
                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'image' => $path,
                    ]);
                    $path = $request->file('image')->store('public/images');
                    $url = Storage::url($path);
                    return back()->with('success', 'Profile updated successfully')->with('path', $url);
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
