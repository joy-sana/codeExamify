<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin_Data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class adminLoginController extends Controller
{

    public function ShowAdminLoginForm()
    {
        return view('admin.adminLogin');
    }


    public function adminAuth(Request $request)
    {
        $input = $request->all();
        $this->validate(
            $request,
            [
                'admin_id' => 'required',
                'password' => 'required',
            ]
        );
        if (Auth::guard('admin_data')->attempt(['admin_id' => $input['admin_id'], 'password' => $input['password']])) {
            $request->session()->put('adminLoginId', auth()->guard('admin_data')->user()->Admin_number);
            return redirect('/Admin/dashboard');
        } else {
            return back()->with('fail', 'password not matches.');
        }
    }





    public function ShowCreateAdminPage()
    {
        return view('Admin.adminRegister');
    }

    public function registerNewAdmin(Request $request)
    {
        // Validate the form inputs
        $validatedData = $request->validate([
            'fullName' => 'required',
            'adminID' => 'required|unique:admin_data,Admin_id',
            'Password' => 'required|min:6',
            'C_Password' => 'required|same:Password',
        ]);

        // Create a new admin record
        $admin = new Admin_Data();
        $admin->Admin_name = $validatedData['fullName'];
        $admin->Admin_id = $validatedData['adminID'];
        $admin->password = Hash::make($validatedData['Password']);
        $admin->save();

        // Redirect or return a response
        return redirect('/Admin/dashboard')->with('success', 'Admin registered successfully!');
    }



    public function ShowUpdateAdminPage(Request $request)
{   
    $admin = Admin_Data::findOrFail(auth()->guard('admin_data')->user()->Admin_number);
    return view('admin.update_admin', ['admin' => $admin]);
}

public function UpdateAdminID(Request $request)
{
    $adminId = $request->input('adminID');

    $validatedData = $request->validate([
        'Admin_name' => 'required',
        'Admin_ID' => 'required|unique:admin_data,Admin_id',
    ]);

    $admin = Admin_Data::find($adminId);
    $admin->Admin_name = $validatedData['Admin_name'];
    $admin->Admin_id = $validatedData['Admin_ID'];
    $admin->save();

    return redirect('/Admin/dashboard')->with('success', 'Admin name and ID updated successfully!');
}


public function UpdatePassword(Request $request)
{
    $validatedData = $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
    ]);

    $admin = Admin_Data::findOrFail(auth()->guard('admin_data')->user()->Admin_number);

    // Check if the current password matches
    if (!Hash::check($validatedData['current_password'], $admin->password)) {
        return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
    }

    // Update the password
    $admin->password = Hash::make($validatedData['new_password']);
    $admin->save();

    return redirect('/Admin/dashboard')->with('success', 'Password updated successfully!');
}



    public function adminLogout()
    {
        if (auth::guard('admin_data')->check()) {
            Auth::guard('admin_data')->logout();
            Session::forget('adminLoginId');
            return redirect('/admin');
        }
    }
}
