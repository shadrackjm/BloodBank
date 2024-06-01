<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donor;
use App\Models\BloodBank;
use App\Models\BloodGroup;
use App\Models\BloodRequest;
use Illuminate\Http\Request;
use App\Models\BloodBankStock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
     public function loadAdminLoginPage(){
        return view('admin.login');
    }

    public function loadAdminProfile(){
        return view('admin.profile');
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
    public function loadAdminDashboard(){
        $bloodGroupsCount = BloodGroup::count();
        $bloodBankCount = BloodBank::count();
        $donorCount = Donor::count();
        $bloodRequest = BloodRequest::count();
        return view('admin.dashboard',compact('bloodGroupsCount','donorCount','bloodBankCount','bloodRequest'));
    }
    public function loadDonorList(){
        $all_donors = Donor::join('users','users.id','=','donors.user_id')
        ->join('blood_groups','blood_groups.id','=','donors.blood_group_id')
        ->get(['donors.*','users.name','users.email','blood_groups.name as blood_group']);
        return view('admin.donor-list',compact('all_donors'));
    }

    public function loadBloodGroup(){
        $bloods = BloodGroup::all();
        return view('admin.blood-group',compact('bloods'));
    }

    public function loadBloodBank(){
        $all_bloodBanks = BloodBank::all();
        return view('admin.blood-bank',compact('all_bloodBanks'));
    }

    public function loadBloodRequests(){
        return view('admin.blood-requests');
    }

    public function loadBloodStock(){
        $all_bloodBanks = BloodBankStock::join('blood_banks','blood_banks.id','=','blood_bank_stocks.blood_bank_id')
        ->join('blood_groups','blood_groups.id','=','blood_bank_stocks.blood_group_id')
        ->get(['blood_bank_stocks.*','blood_groups.name as group_name','blood_banks.name','blood_banks.address']);
        return view('admin.bloodbanks.blood-bank-stocks',compact('all_bloodBanks'));
    }

    public function loadUsers(){
        $all_users = User::all();
        return view('admin.users',compact('all_users'));
    }

    public function loadAddBlood(){
        return view('admin.blood-group-form');
    }

    public function loadEditBloodGroup($id){
        $blood = BloodGroup::find($id);
        return view('admin.edit-blood-group',compact('blood'));
    }
    public function addBloodGroup(Request $request){
        $request->validate([
            'name' => 'required|unique:blood_groups'
        ]);
        try {
            $new = new BloodGroup;
            $new->name = $request->name;
            $new->save();
            return redirect('/admin/blood-groups')->with('success','blood Group added successfully');
        } catch (\Exception $th) {
            return redirect('/admin/blood-groups')->with('fail',$th->getMessage());

        }
        
    }

    public function deleteBloodGroup($id){
        
        try {
            $blood = BloodGroup::find($id);
            $blood->delete();
            return redirect('/admin/blood-groups')->with('success','blood group deleted successfully');
        } catch (\Exception $th) {
            return redirect('/admin/blood-groups')->with('fail',$th->getMessage());
        }
    }

    public function editBloodGroup(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        try {
            $blood = BloodGroup::find($request->blood_id);
            $blood->update([
                'name' => $request->name
            ]);
            return redirect('/admin/blood-groups')->with('success','blood group updated successfully');
        } catch (\Exception $th) {
            return redirect('/admin/blood-groups')->with('fail',$th->getMessage());
        }
    }

    public function loadAddBloodBank(){
        return view('admin.bloodbanks.blood-bank-form');
    }

     public function addBloodBank(Request $request){
        $request->validate([
            'name' => 'required|unique:blood_banks',
            'address' => 'required',
        ]);
        try {
            $new = new BloodBank;
            $new->name = $request->name;
            $new->address = $request->address;
            $new->save();

            return redirect('/admin/blood-bank')->with('success','blood Bank added successfully');
        } catch (\Exception $th) {
            return redirect('/admin/blood-bank')->with('fail',$th->getMessage());

        }
        
    }

     public function deleteBloodBank($id){
        
        try {
            $blood = BloodBank::find($id);
            $blood->delete();
            return redirect('/admin/blood-bank')->with('success','blood bank deleted successfully');
        } catch (\Exception $th) {
            return redirect('/admin/blood-bank')->with('fail',$th->getMessage());
        }
    }

    public function loadEditBloodBank($id){
        $bloodBank = BloodBank::find($id);
        $AllbloodBanks = BloodBank::where('id','!=',$bloodBank->id)->get();
        return view('admin.bloodbanks.edit-blood-blank',compact('bloodBank','AllbloodBanks'));
    }

    public function editBloodBank(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
        try {
            $blood = BloodBank::find($request->blood_bank_id);
            $blood->update([
                'name' => $request->name,
                'address' => $request->address
            ]);
            return redirect('/admin/blood-bank')->with('success','blood group updated successfully');
        } catch (\Exception $th) {
            return redirect('/admin/blood-bank')->with('fail',$th->getMessage());
        }
    }

    // blood bank stocks

    public function loadAddBloodBankStock(){
        $bloodBank = BloodBank::all();
        $bloodGroup = BloodGroup::all();
        return view('admin.bloodbanks.stock',compact('bloodGroup','bloodBank'));
    }
    public function addBloodBankStock(Request $request){
        $request->validate([
            'blood_bank_id' => 'required',
            'blood_group_id' => 'required',
            'amount' => 'required',
        ]);
        try {
            $new = new BloodBankStock();
            $new->blood_bank_id = $request->blood_bank_id;
            $new->blood_group_id = $request->blood_group_id;
            $new->amount = $request->amount;
            $new->save();
            return redirect('/admin/blood-stock')->with('success','blood Bank Stock added successfully');
        } catch (\Exception $th) {
            return redirect('/admin/blood-stock')->with('fail',$th->getMessage());

        }
        
    }

     public function deleteBloodBankStock($id){
        
        try {
            $blood = BloodBankStock::find($id);
            $blood->delete();
            return redirect('/admin/blood-stock')->with('success','blood bank stock deleted successfully');
        } catch (\Exception $th) {
            return redirect('/admin/blood-stock')->with('fail',$th->getMessage());
        }
    }

    public function loadEditBloodBankStock($id){
        $bloodBankStock = BloodBankStock::join('blood_banks','blood_banks.id','=','blood_bank_stocks.blood_bank_id')
        ->join('blood_groups','blood_groups.id','=','blood_bank_stocks.blood_group_id')
        ->where('blood_bank_stocks.id',$id)
        ->first(['blood_bank_stocks.*','blood_groups.name as group_name','blood_groups.id as group_id','blood_banks.name','blood_banks.id as bloodBank_id','blood_banks.address']);
        $bloodGroups = BloodGroup::where('id','!=',$bloodBankStock->group_id)->get();
        $bloodBanks = BloodBank::where('id','!=',$bloodBankStock->bloodBank_id)->get();


        return view('admin.bloodbanks.edit-blood-blank',compact('bloodBankStock','bloodBanks','bloodGroups'));
    }

    public function editBloodBankStock(Request $request){
        $request->validate([
            'blood_bank_id' => 'required',
            'blood_group_id' => 'required',
            'amount' => 'required|integer',
        ]);
        try {
            $blood = BloodBankStock::find($request->blood_bank_id);
            $blood->update([
                'blood_group_id' => $request->blood_group_id,
                'amount' => $request->amount
            ]);
            return redirect('/admin/blood-stock')->with('success','blood bank stock updated successfully');
        } catch (\Exception $th) {
            return redirect('/admin/blood-stock')->with('fail',$th->getMessage());
        }
    }
    // donor
    public function loadAddDonor(){
        $bloods = BloodGroup::all();
        return view('admin.donor.add-donor-form',compact('bloods'));
    }

     public function addDonor(Request $request){
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

            $newUser = new User;
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->password = Hash::make('123456');
            $newUser->save();

            $new = new Donor;
            $new->user_id = $newUser->id;
            $new->blood_group_id = $request->blood_group_id;
            $new->age = $request->age;
            $new->gender = $request->gender;
            $new->phone = $request->phone;
            $new->address = $request->address;
            $new->next_donation = $request->next_donation;
            $new->save();

            return redirect('/admin/donor/list')->with('success','Donor added successfully');
        } catch (\Exception $th) {
            return redirect('/admin/donor/list')->with('fail',$th->getMessage());

        }
        
    }

     public function deleteDonor($id){
        
        try {
            $blood = Donor::find($id);
            $blood->delete();
            return redirect('/admin/donor/list')->with('success','Donor deleted successfully');
        } catch (\Exception $th) {
            return redirect('/admin/donor/list')->with('fail',$th->getMessage());
        }
    }

    public function loadEditDonor($id){
        $bloods = BloodGroup::all();
        $donor = Donor::join('users','users.id','=','donors.user_id')
        ->join('blood_groups','blood_groups.id','=','donors.blood_group_id')
        ->where('donors.id',$id)
        ->first(['donors.*','users.id as user_id','users.name','users.email','blood_groups.name as group_name','blood_groups.id as group_id']);
        return view('admin.donor.edit-donor',compact('donor','bloods'));
    }

    public function EditDonor(Request $request){
         $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'string',
            'phone' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'blood_group_id' => 'required',
            'status' => 'required',
        ]);
        try {
            $blood = User::find($request->user_id);
            $donor = Donor::find($request->donor_id);
            $blood->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            $donor->update([
                'phone' => $request->phone,
                'age' => $request->age,
                'gender' => $request->gender,
                'address' => $request->address,
                'blood_group_id' => $request->blood_group_id,
                'status' => $request->status,
            ]);
            return redirect('/admin/donor/list')->with('success','Donor updated successfully');
        } catch (\Exception $th) {
            return redirect('/admin/donor/list')->with('fail',$th->getMessage());
        }
    }
}
