<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function postRegisterData(Request $request)
    {
        //server site validation
        $request->validate(
            [
                'fullName' => 'required',
                'Username' => 'required',
                'phoneNumber' => 'required',
                'Email_id' => 'required|email',
                'Password' => 'required',
                'C_Password' => 'required|same:Password'
            ]
        );

        // Inserting data to database
        $user_data = new User_data;
        $user_data->name = $request['fullName'];
        $user_data->username = $request['Username'];
        $user_data->mobile  = $request['phoneNumber'];
        $user_data->email = $request['Email_id'];
        $user_data->gender = $request['gender'];
        $user_data->dob = $request['dob'];
        $user_data->password = Hash::make($request['Password']);
        $user_data->confirm_pass = Hash::make($request['C_Password']);
        $user_data->save();

        return redirect('/AcoountSuccess');
    }

    //login form 

    public function userAuth(Request $request){
        $input = $request->all();
        $this->validate($request,
                    [
                        'email' => 'required|email',
                        'password' => 'required',
                    ]
        );
        if(Auth::guard('user_data')->attempt(['email' => $input['email'],'password' => $input['password']])){
            $request->session()->put('loginId', auth()->guard('user_data')->user()->student_id);    
            // return redirect('/home')->with('pass', 'successfully login');
            return redirect('/home')->with('success', 'You have successfully logged in!');
            } else {
                return back()->with('fail', 'password not matches.');
            }
    }










    public function logoutUser()
{
    if (Auth::guard('user_data')->check()) {
        Auth::guard('user_data')->logout();
        Session::forget('loginId');
        return redirect('/login');
    }
}


}
