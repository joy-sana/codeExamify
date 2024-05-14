<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User_data;
use App\Models\UserFeedback;
use App\Models\ExamResult;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use LDAP\Result;

class DashbordController extends Controller
{

    public function ShowUsers(Request $request)
    {
        $search =  $request['search'] ?? "";

        if ($search !== '') {
            $search_count = User_data::where('name', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->count();
            if ($search_count === null || $search_count === 0) {
                $search_count = 0;
            }
            $user_datas = User_data::where('name', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->paginate(10);
            $user_datas->appends(['search' => $search]);
        } else {
            $search_count = Null;
            $user_datas = User_data::paginate(10);
        }
        $user_count = User_data::count();

        $data = compact('user_datas', 'search', 'user_count', 'search_count');
        return view('Admin.user-management')->with($data);
    }




    

    //DASHBOARD
   
    public function showDashbord(Request $request)
{
    $user_datas = User_data::orderBy('created_at', 'desc')->take(10)->get();
    $UserFeedbacks = UserFeedback::orderBy('created_at', 'desc')->get();
    $allResults = ExamResult::with('studentData')->orderBy('created_at', 'desc')->paginate(10);
    $subjects = Subject::orderBy('created_at', 'desc')->get();
    $subjects_count = Subject::count();
    $user_count = User_data::count();

    $data = compact('user_datas', 'user_count', 'UserFeedbacks', 'allResults','subjects','subjects_count');

    return view('admin.dashboard')->with($data);
}







    

    public function deleteUser($id)
    {
        $userdata = User_data::find($id);
        if (!is_null($userdata)) {
            $userdata->delete();
        }
        return redirect('/Admin/management/user');
    }

    public function showUpdatePage($id)
    {
        $userdata = User_data::find($id);
        if (is_null($userdata)) {

            return redirect('/Admin/management/user');
        } else {
            $url = url('/Admin/management/user/update') . '/' . $id;
            $data = compact('userdata', 'url');
            return view('Admin.UserUpdate')->with($data);
        }
    }


    public function postUpdatePage($id, Request $request)
    {

        $request->validate(
            [
                'fullName' => 'required',
                'Username' => 'required',
                'phoneNumber' => 'required',
                'Email_id' => 'required|email',
            ]
        );

        $user_data = User_data::find($id);
        $user_data->name = $request['fullName'];
        $user_data->username = $request['Username'];
        $user_data->mobile  = $request['phoneNumber'];
        $user_data->email = $request['Email_id'];
        $user_data->gender = $request['gender'];
        $user_data->dob = $request['dob'];
        $user_data->save();

        return redirect('/Admin/management/user');
    }
}
