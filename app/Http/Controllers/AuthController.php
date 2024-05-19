<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Models\UserProfile;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function registerDonor(Request $request){
        // perform validation here
        $request->validate([
            'full_name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:8|confirmed',
        ]);
        
        try {
            $user = new User;
            $user->name = $request->full_name;
            $user->email = $request->email;
            $user->password = Hash::make( $request->password );
            $user->save();

            $asDonor = new Donor;
            $asDonor->user_id = $user->id;
            $asDonor->age = $request->age;
            $asDonor->phone = $request->phone;
            $asDonor->address = $request->address;
            $asDonor->gender = $request->gender;
            $asDonor->blood_group_id = $request->blood_group;
            $asDonor->save();

            $data['email'] = $request->email;
            $data['title'] = 'Welcome to BloodBank Management system';
            $data['body'] = 'You have been registered successfully';

            Mail::send('newUserMail',['data' => $data], function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });

            return redirect('/donor/registration')->with('success','You Have been Registered Successfully!');
        } catch (\Exception $e) {
            return redirect('/donor/registration')->with('error',$e->getMessage());
            
        }
    }

    // this perform login functionality
    public function LoginUser(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6|max:8',
        ]);
        
        try {
            // login logic here
            $userCredentials = $request->only('email','password');

            if(Auth::attempt($userCredentials)){
                // redirect user to home page based on role 
                // this allow us to use single login page to authenticate users with different roles..

                if(auth()->user()->role == 0){ //here role is a column I added in users table
                    return redirect('/donor/home');
                }elseif(auth()->user()->role == 1){
                    return redirect('/admin/dashboard');
                }
                elseif(auth()->user()->role == 2){
                    return redirect('/blood-bank/dashboard');
                }else{
                    return redirect('/')->with('error','Error to find your role');
                }
                
            }else{
                return redirect(auth()->user()->role == 0 ? '/donor/login' : '/admin/login')->with('error','Wrong User Credentials');
            }
        } catch (\Exception $e) {
            return redirect(auth()->user()->role == 0 ? '/donor/login' : '/admin/login')->with('error',$e->getMessage());
        }
    }
    // perform logout function here
    public function LogoutUser(Request $request){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
    // this for password resetting..
    public function forgotPassword(){
        return view('forgot-password');
    }

    // perform email sending logic here
    public function forgot(Request $request){
        // validate here
        $request->validate([
            'email' => 'required'
        ]);
        // check if email exist
        $user = User::where('email',$request->email)->get();

        foreach ($user as $value) {
            # code...
        }

        if(count($user) > 0){
            $token = Str::random(40);
            $domain = URL::to('/');
            $url = $domain.'/reset/password?token='.$token;

            $data['url'] = $url;
            $data['email'] = $request->email;
            $data['title'] = 'Password Reset';
            $data['body'] = 'Please click the link below to reset your password';

            Mail::send('forgotPasswordMail',['data' => $data], function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });
            
            $passwordReset = new PasswordReset;
            $passwordReset->email = $request->email;
            $passwordReset->token = $token;
            $passwordReset->user_id = $value->id;
            $passwordReset->save();

            return back()->with('success','please check your mail inbox to reset your password');
        }else{
            return redirect('/forgot/password')->with('error','email does not exist!');
        }
    
    }

    public function loadResetPassword(Request $request){
        $resetData = PasswordReset::where('token',$request->token)->get();
        if(isset($request->token) && count($resetData) > 0){
            $user = User::where('id',$resetData[0]['user_id'])->get();
            foreach ($user as $user_data) {
                # code...
            }
            return view('reset-password',compact('user_data'));
        }else{
            return view('404');
        }
    }

    // perform password reset logic here

    public function ResetPassword(Request $request){
        $request->validate([
            'password' => 'required|min:6|max:8|confirmed'
        ]);
        try {
            $user = User::find($request->user_id);
            $user->password = Hash::make($request->password);
            $user->save();

            // delete reset token
            PasswordReset::where('email',$request->user_email)->delete();

            return redirect($user->role == 0 ? '/donor/login' : '/admin/login')->with('success','Password Changed Successfully');
        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }
    }

    public function load404(){
        return view('404');
    }

}
