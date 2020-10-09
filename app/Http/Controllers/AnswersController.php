<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\User;
use App\Quiz;

class AnswersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        //$answers = Answer::orderBy('created_at', 'desc')->paginate(5);
        return view('answers.index')->with('answers', $user->answers); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Not relevant in this controller
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'MCQ' => 'required'
        ]);

        //create a new Quiz
        $answer = new Answer;
        $answer->answer = $request->input('MCQ');
        $answer->question_id = $request->input('question_id');
        $answer->user_id = auth()->user()->id;
        if($request->input('MCQ') == $request->input('question_answer')){
            $answer->mark = '1';
        }
        else{
            $answer->mark = '0';
        }
        $answer->save();
        $quiz_id = $request->input('quiz_id');
        $counting = $request->input('counting');
        $counting = $counting + 1;
        $quiz = Quiz::find($quiz_id);
        return view('questions.show')->with('questions', $quiz->questions)->with('counting', $counting);
        //return redirect()->route('question_next', ['quiz_id' => $quiz_id, 'counting' => $counting])->with('success', "Answer saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = Answer::find($id);

        //Check for correct user id
        if(auth()->user()->id !== $answer->user_id){
            return redirect('/answers')->with('error', 'Unauthorized access');
        }

        return view('answers.show')->with('answer', $answer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //not being implemented at the moment
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //not being implemented at the moment
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //not being implemented at the moment
    }
}
