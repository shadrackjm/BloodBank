<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donor;
use App\Models\Donation;
use App\Models\BloodGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DonorController extends Controller
{
    public function loadHomePage(){
        $user = auth()->user();
        $donor = Donor::where('user_id',$user->id)->first();
        $is_public = $donor->is_public;
        $my_donations = Donation::join('users','users.id','=','donations.user_id')
        ->join('donors','donors.user_id','=','donations.user_id')
        ->where('donations.user_id',$user->id)->limit(5)->get(['users.name','donations.*']);
        return view('donor.home-page',compact('my_donations','is_public'));
    }

    public function loadAllDonations(){
        $user = auth()->user();
        $donor = Donor::where('user_id',$user->id)->first();
        $is_public = $donor->is_public;

        $my_donations = Donor::join('users', 'users.id', '=', 'donors.user_id')
            ->join('blood_groups', 'blood_groups.id', '=', 'donors.blood_group_id')
            ->join('donations','donations.user_id', '=', 'users.id')
            ->where('donations.user_id',$user->id)
            ->get(['donations.donation_date','donations.amount','donors.*', 'users.name', 'users.email', 'blood_groups.name as blood_group','donations.next_donation']);
        return view('donor.all-donation',compact('my_donations','is_public'));
    }
    public function loadProfile(){
        $user = auth()->user();
        $donor = Donor::where('user_id',$user->id)->first();
        $is_public = $donor->is_public;
        $donor_details = Donor::join('blood_groups','blood_groups.id','=','donors.blood_group_id')
         ->where('donors.user_id',auth()->user()->id)->first(['donors.*','blood_groups.name','blood_groups.id as blood_group_id']);
        $blood_groups = BloodGroup::where('id','!=',$donor_details->blood_group_id)->get();
        return view('donor.profile',compact('donor_details','is_public','blood_groups'));
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
                        'age' => $request->age,
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
                        'age' => $request->age,
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
                        'password' => Hash::make($request->password),
                    ]);
                    return back()->with('success', 'Password updated successfully');
        } catch (\Exception $th) {
                    return back()->with('fail', $th->getMessage());
        }

    }

    public function publicPrivate(){
        $user = auth()->user();
        $donor = Donor::where('user_id',$user->id)->first();

        if ($donor->is_public == 1) {
            $donor->update([
            'is_public' => 0
            ]);
        }else
        $donor->update([
            'is_public' => 1
        ]);

        return redirect()->back();
    }

    public function deleteAccount(){
        $user = auth()->user();
        $delete = User::where('id',$user->id)->delete();
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
