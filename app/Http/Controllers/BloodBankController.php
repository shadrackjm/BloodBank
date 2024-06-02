<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BloodBank;
use App\Models\BloodGroup;
use App\Models\BloodRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BloodBankController extends Controller
{
    public function loadHomePage(){
        $request_details = BloodRequest::join('blood_groups','blood_groups.id','=','blood_requests.blood_group_id')
        ->limit(10)
        ->where('blood_bank_id',auth()->user()->id)
        ->get(['blood_groups.name as blood_group','blood_requests.*']);
        return view('blood-bank.home',compact('request_details'));
    }

    public function loadProfile(){
        $donor_details = BloodBank::where('user_id',auth()->user()->id)->first();
        return view('blood-bank.profile',compact('donor_details'));
    }

     public function loadBloodRequests(){
        $request_details = BloodRequest::join('blood_groups','blood_groups.id','=','blood_requests.blood_group_id')
        ->where('blood_bank_id',auth()->user()->id)
        ->get(['blood_groups.name as blood_group','blood_requests.*']);
        return view('blood-bank.requests',compact('request_details'));
    }

    public function loadBloodRequestsForm(){
        $blood_groups = BloodGroup::all();
        return view('blood-bank.requests-form',compact('blood_groups'));
    }

     public function loadEditRequestsForm($id){
        $request = BloodRequest::join('blood_groups','blood_groups.id','=','blood_requests.blood_group_id')
        ->where('blood_requests.id',$id)
        ->first(['blood_groups.name as blood_group','blood_groups.id as blood_group_id','blood_requests.*']);
        $blood_groups = BloodGroup::where('id','!=',$request->blood_group_id)->get();
        return view('blood-bank.edit-requests-form',compact('blood_groups','request'));
    }

     public function addRequest(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'string',
            'phone' => 'string',
            'age' => 'required',
            'gender' => 'required',
            'blood_group_id' => 'required',
        ]);
        try {
            $new = new BloodRequest();
            $new->blood_group_id = $request->blood_group_id;
            $new->blood_bank_id = auth()->user()->id;
            $new->Name = $request->name;
            $new->email = $request->email;
            $new->age = $request->age;
            $new->gender = $request->gender;
            $new->phone_number = $request->phone;
            $new->address = $request->address;
            $new->amount = $request->amount;
            $new->price = $request->price;
            $new->status = $request->status;
            $new->save();

            return redirect('/blood-requests')->with('success','Patient Blood Request added successfully');
        } catch (\Exception $th) {
            return redirect('/blood-requests')->with('fail',$th->getMessage());

        }
        
    }

     public function editRequest(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'string',
            'phone' => 'string',
            'age' => 'required',
            'gender' => 'required',
            'blood_group_id' => 'required',
        ]);
        try {
            $updateRequest = BloodRequest::find($request->request_id);
            $updateRequest->update([
                    'blood_group_id' => $request->blood_group_id,
                    'Name' => $request->name,
                    'email' => $request->email,
                    'age' => $request->age,
                    'gender' => $request->gender,
                    'phone_number' => $request->phone,
                    'address' => $request->address,
                    'amount' => $request->amount,
                    'price' => $request->price,
                    'status' => $request->status,
            ]);
            

            return redirect('/blood-requests')->with('success','Patient Blood Request Updated successfully');
        } catch (\Exception $th) {
            return redirect('/blood-requests')->with('fail',$th->getMessage());

        }
        
    }
    public function UpdateProfile(Request $request){
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'email' => 'required',
        ]);
        try {
                if ($request->file('image')) {
                    $path = $request->file('image')->store('public/images');
                    $user = User::find(auth()->user()->id);
                    $old_image = $user->image;
                    if (!empty($old_image)) {
                        Storage::delete($old_image);
                    }
                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'image' => $path,
                    ]);
                    $url = Storage::url($path);
                    return back()->with('success', 'Profile updated successfully')->with('path', $url);
                }else{
                    $user = User::find(auth()->user()->id);
                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email,
                    ]);
                   
                    $update_age = BloodBank::where('user_id',$user->id)->first();
                    $update_age->update([
                        'address' => $request->address,
                        'name' => $request->name
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
