<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_data;
use App\Models\UserFeedback;
use Illuminate\Support\Facades\Session;
use App\Models\QuestionANS;
use App\Models\QuestionsTable;
use App\Models\Subject;

class ViewsController extends Controller
{


    public function showfeedback()
    {
        return view('feedback');
    }

    public function showCongratultion()
    {

        return view('user.afterRegister');
    }

    public function showFAQpage()
    {
        return view('FAQ');
    }
    public function StoreFeedback(Request $request)
    {
        $feedback = new UserFeedback;
        $feedback->feedback_content = $request->input('content');
        $feedback->userFullName = $request->input('username');
        // $feedback->time = $request->input('time');
        $feedback->save();

        return redirect()->route('feedback.create')->with('success', 'We appreciate your feedback. Thank you!!!');
    }


    public function test()
    {
        return view('testDialog');
    }
    public function showHero()
    {
        return view('index');
    }

    public function showDashbord()
    {
        return view('admin.dashboard');
    }

    public function showRegisterForm()
    {
        return view('User.signUp');
    }

    public function showLoginForm()
    {
        return view('User.signin');
    }

    public function welcome()
    {
        $userdata = array();
        if (Session::has('loginId')) {
            $userdata = User_data::where('student_id', '=', Session::get('loginId'))->first();
        }
        $data = compact('userdata');
        return view('welcome')->with($data);
    }










    // public function showProfilePage($id)
    // {

    //     $user_data = User_data::find($id);
    //     $data = compact('user_data');
    //     return view('user.UserProfile')->with($data);
    // }












    public function showLearningPage()
    {
        return view('LearnCodingCards');
    }

    public function showStartExamPage($subjectId)
    {
        $subjectROW = Subject::find($subjectId);
        $data = compact('subjectROW');
        return view('Exam.StartExam')->with($data);
    }
}
