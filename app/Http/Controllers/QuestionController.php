<?php

namespace App\Http\Controllers;

use App\Models\QuestionsTable;
use App\Models\Subject;
use App\Models\ExamResult;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function ShowSubjectsUpload(Request $request)
    {
        return view('Exam.UploadSubjects');
    }

    public function PostSubjects(Request $request)
    {
        $validatedData = $request->validate([
            'subject_code' => 'required|unique:subjects,subject_code',
            'subject_name' => 'required|unique:subjects,subject_name',
            'description' => 'nullable',
        ]);

        $subject = new Subject;
        $subject->subject_code = $validatedData['subject_code'];
        $subject->subject_name = $validatedData['subject_name'];
        $subject->description = $validatedData['description'];
        $subject->save();

        return redirect('/Admin/upload/Exam')->with('success', 'Subject created successfully!');
    }



    public function ShowQustionUploadPage()
    {
        // Fetch all subjects
        $subjects = Subject::orderBy('created_at', 'desc')->get();
        return view('Exam.UploadQuestion', compact('subjects'));
    }

    public function PostQustionUploadPageData(Request $request)
    {
        $questions = $request->input('questions');
        $options = $request->input('options');
        $ans = $request->input('ans');
        $subject_id = $request->input('subject_id');

        $data = array();
        for ($i = 0; $i < count($questions); $i++) {
            $question = array(
                'subject_id' => $subject_id,
                'question' => $questions[$i],
                'ans1' => $options[$i][0],
                'ans2' => $options[$i][1],
                'ans3' => $options[$i][2],
                'ans4' => $options[$i][3],
                'ans' => $ans[$i]
            );
            array_push($data, $question);
        }

        // Save questions to database
        foreach ($data as $question) {
            $q = new QuestionsTable;
            $q->subject_id = $question['subject_id'];
            $q->question = $question['question'];
            $q->ans1 = $question['ans1'];
            $q->ans2 = $question['ans2'];
            $q->ans3 = $question['ans3'];
            $q->ans4 = $question['ans4'];
            $q->ans = $question['ans'];
            $q->save();
        }

        return redirect()->back()->with('success', 'Exam questions uploaded successfully!');
    }
    // 
    // 
    // 

    public function showSelectSubjectPage()
    {
        $subjects = Subject::orderBy('created_at', 'desc')->get();
        $data = compact('subjects');
        return view('Exam.SelectSubjectPage')->with($data);
    }
    

    
    
    
    
    public function ShowALLQustions()
    {
        $subjects = Subject::all();
        $questions = QuestionsTable::all();
        
        return view('Exam.showAllQuestions', compact('subjects', 'questions'));
    }
    
    
    
    
    
    
    public function postSelectSubjectPageANDshowQuestionEditPage(Request $request){
        $subject_id = $request->input('subject_id');
        $questions = QuestionsTable::where('subject_id', $subject_id)->orderBy('created_at', 'desc')->get();
        $data = compact('questions','subject_id');
        return view('Exam.EditQuestion')->with($data);
    }
    public function postQuestionEditData (Request $request){
        $subject_id = $request->input('subject_id');
        $questions = $request->input('questions');
        $options = $request->input('options');
        $ans = $request->input('ans');
    
        // Get all the questions that are being updated
        $existingQuestions = QuestionsTable::where('subject_id', $subject_id)->orderBy('created_at', 'desc')->get();
    
        // Loop through the questions and update them
        foreach ($existingQuestions as $question) {
            $question->id = $questions[$question->id];
            $question->ans1 = $options[$question->id][0];
            $question->ans2 = $options[$question->id][1];
            $question->ans3 = $options[$question->id][2];
            $question->ans4 = $options[$question->id][3];
            $question->ans = $ans[$question->id];
            $question->save();
        }
        return redirect()->back()->with('success', 'Questions updated successfully!');
    }



    public function showExamPage($subjectId)
    {
        $marks = 0;
        $quiz = QuestionsTable::where('subject_id', $subjectId)->orderBy('created_at', 'desc')->get();
        $data = compact('quiz', 'marks', 'subjectId');

        session(['exam_started' => true, 'subject_id' => $subjectId]);
        return view('Exam.ExamPage')->with($data);
    }


    public function submitExam(Request $request){
        $subjectId = $request->input('subjectId');
        $studentName = $request->input('student_name');
        $studentId = $request->input('studentId');

        $questions = QuestionsTable::where('subject_id', $subjectId)->orderBy('created_at', 'desc')->get();
        $marks = 0;

        foreach ($questions as $question) {
            $questionId = $question->id;
            $userAnswer = $request->input('OptionOf_' . $questionId);
            $correctAnswer = $question->ans;
            if ($userAnswer == $correctAnswer) {
                $marks = $marks + 1;
            } else {
                $marks = $marks + 0;
            }
        }
        //stores data
        $exam_result = new ExamResult();
        $exam_result->subject_id = $question->subject_id;
        $exam_result->student_id =  $studentId;
        $exam_result->marks_obtained = $marks;
        $exam_result->save();

        $data = compact('marks','subjectId');
        $request->session()->forget('exam_started');
        return view('Exam.ExamResult')->with($data);
    }
}
