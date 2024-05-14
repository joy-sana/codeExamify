<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_data;
use App\Models\ExamResult;
use App\Models\UserFeedback;
use App\Models\Feedback;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;


class userController extends Controller
{

    public function showProfilePage($id)
    {
        $userdata = User_data::find($id);
        $results = ExamResult::where('student_id', $id)->orderBy('created_at', 'desc')->get();
        $result_count = ExamResult::where('student_id', $id)->count();

        $UpdateUrl = url('/profile/update') . '/' . $id;
        $ChangeUrl = url('/profile/change-password') . '/' . $id;
        $data = compact('userdata', 'UpdateUrl','ChangeUrl','results','result_count');

        return view('user.UserProfile')->with($data);
    }

    public function showFEEDback()
    {
        return view('feedbackUpdate');
    }

    public function store(Request $request)
    {
        $feedback = new UserFeedback;
        $feedback->content = $request->input('content');
        $feedback->username = $request->input('username');
        $feedback->time = $request->input('time');
        $feedback->save();
    
        return redirect()->route('feedback.create')->with('success', 'Feedback submitted successfully!');
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

        return redirect("/profile/$id")->with('success', 'profile updated successfully');
    }


    public function showChangePassword($id){
        $userdata = User_data::find($id);
        if (is_null($userdata)) {
            redirect('/management');
        } else {
            $ChangeUrl = url('profile/change-password') . '/' . $id;
            $data = compact('userdata', 'ChangeUrl');
            return view('User.change-pass')->with($data);
        }
    }
    public function postChangePassword($id, Request $request){
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmNewPassword' => 'required|same:newPassword'

        ]);
        $user_data = User_data::find($id);
        if (hash::check($request->oldPassword, $user_data->password)) {
            $user_data->password = Hash::make($request['newPassword']);
            $user_data->confirm_pass = Hash::make($request['confirmNewPassword']);
            $user_data->save();
            return redirect("/profile/$id")->with('success', 'Password change succesfully!!');
        } else {
            return back()->withErrors(['oldPassword' => 'Wrong old Password']);
        }
    }
    // public function hero()
    // {
    //     return view('index');
    // }


    // public function showRegisterForm()
    // {
    //     return view('signUp');
    // }


    // public function showLoginForm()
    // {
    //     return view('auth.signin');
    // }


    // public function welcome()
    // {
    //     $userdata = array();
    //     if (Session::has('loginId')) {
    //         $userdata = User_data::where('student_id', '=', Session::get('loginId'))->first();
    //     }
    //     $data = compact('userdata');
    //     return view('welcome')->with($data);
    // }


    // public function logout()
    // {
    //     if (Session::has('loginId')) {
    //         Session::pull('loginId');
    //         return redirect('/login');
    //     }
    // }

    // public function postRegisterData(Request $request)
    // {
    //     //server site validation
    //     $request->validate(
    //         [
    //             'fullName' => 'required',
    //             'Username' => 'required',
    //             'phoneNumber' => 'required',
    //             'Email_id' => 'required|email',
    //             'Password' => 'required',
    //             'C_Password' => 'required|same:Password'
    //         ]
    //     );

    //     // Inserting data to database
    //     $user_data = new User_data;
    //     $user_data->name = $request['fullName'];
    //     $user_data->username = $request['Username'];
    //     $user_data->mobile  = $request['phoneNumber'];
    //     $user_data->email = $request['Email_id'];
    //     $user_data->gender = $request['gender'];
    //     $user_data->dob = $request['dob'];
    //     $user_data->password = Hash::make($request['Password']);
    //     $user_data->confirm_pass = Hash::make($request['C_Password']);
    //     $user_data->save();

    //     // $massage="Your Account created Succesfully!!";
    //     // $data=compact('massage');
    //     return redirect('/home');
    // }


    // public function authenticateUser(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'email' => 'required|email',
    //             'password' => 'required',
    //             // 'C_Password' => 'required|same:Password'
    //         ]
    //     );
    //     $user = User_data::Where('email', '=', $request->email)->first();
    //     // dd($user)
    //     if ($user) {
    //         if (Hash::check($request->password, $user->password)) {
    //             $request->session()->put('loginId', $user->student_id);
    //             return redirect('/welcome');
    //         } else {
    //             return back()->with('fail', 'password not matches.');
    //         }
    //     } else {
    //         return back()->with('fail', 'email not found.');
    //     }
    // }


    // public function ShowUsers(Request $request)
    // {
    //     $search =  $request['search'] ?? "";

    //     if ($search !== '') {
    //         $search_count = User_data::where('name', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->count();
    //         if ($search_count === null || $search_count === 0) {
    //             $search_count = 0;
    //         }
    //         $user_datas = User_data::where('name', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->paginate(10);
    //         $user_datas->appends(['search' => $search]);
    //     } else {
    //         $search_count = Null;
    //         $user_datas = User_data::paginate(10);
    //     }
    //     $user_count = User_data::count();
    //     $data = compact('user_datas', 'search', 'user_count', 'search_count');
    //     return view('user-management')->with($data);
    // }


    // public function delete($id)
    // {
    //     $userdata = User_data::find($id);
    //     if (!is_null($userdata)) {
    //         $userdata->delete();
    //     }
    //     return redirect('/management');
    // }


    // public function edit($id)
    // {
    //     $userdata = User_data::find($id);
    //     if (is_null($userdata)) {

    //         return redirect('/management');
    //     } else {
    //         $url = url('/management/update') . '/' . $id;
    //         $data = compact('userdata', 'url');
    //         return view('update')->with($data);
    //     }
    // }


    // public function update($id, Request $request)
    // {

    //     $request->validate(
    //         [
    //             'fullName' => 'required',
    //             'Username' => 'required',
    //             'phoneNumber' => 'required',
    //             'Email_id' => 'required|email',
    //         ]
    //     );

    //     $user_data = User_data::find($id);
    //     $user_data->name = $request['fullName'];
    //     $user_data->username = $request['Username'];
    //     $user_data->mobile  = $request['phoneNumber'];
    //     $user_data->email = $request['Email_id'];
    //     $user_data->gender = $request['gender'];
    //     $user_data->dob = $request['dob'];
    //     $user_data->save();

    //     return redirect('/management');
    // }


    // public function pass_change($id)
    // {
    //     $userdata = User_data::find($id);
    //     if (is_null($userdata)) {
    //         redirect('/management');
    //     } else {
    //         $url = url('management') . '/' . 'change-password';
    //         $data = compact('userdata', 'url');
    //         return view('change-pass')->with($data);
    //     }
    // }


    // public function pass_update($id, Request $request)
    // {
    // }
}
