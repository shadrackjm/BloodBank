<?php

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use App\Models\Donor;
use App\Models\User;
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
        return view('admin.blood-bank');
    }

    public function loadBloodRequests(){
        return view('admin.blood-requests');
    }

    public function loadBloodStock(){
        return view('admin.stock');
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
            return redirect('/blood-groups')->with('success','blood Group added successfully');
        } catch (\Exception $th) {
            return redirect('/blood-groups')->with('fail',$th->getMessage());

        }
        
    }

    public function deleteBloodGroup($id){
        
        try {
            $blood = BloodGroup::find($id);
            $blood->delete();
            return redirect('/blood-groups')->with('success','blood group deleted successfully');
        } catch (\Exception $th) {
            return redirect('/blood-groups')->with('fail',$th->getMessage());
        }
    }

    public function editBloodGroup(Request $request){
        
        try {
            $blood = BloodGroup::find($request->blood_id);
            $blood->update([
                'name' => $request->name
            ]);
            return redirect('/blood-groups')->with('success','blood group updated successfully');
        } catch (\Exception $th) {
            return redirect('/blood-groups')->with('fail',$th->getMessage());
        }
    }
}
