<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Question;
USE App\Quiz;
USE App\Result;

class QuestionsController extends Controller
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
        //implemented in "quizzes/edit", ignore this for now
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //implemented another way, ignore this for now
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->level < 2){
            return redirect('/dashboard')->with('error', 'Unauthorized access');
        }

        $this->validate($request, [
            'title' => 'required',
            'answer' => 'required',
        ]);

        //create a new Question
        $question = new Question;
        $question->title = $request->input('title');
        //Check for empty input A
        if($request->input('A') == null || $request->input('A') == ""){
            $question->A = "NULL";
        }
        else{
            $question->A = $request->input('A');
        }
        //Check for empty input B
        if($request->input('B') == null || $request->input('B') == ""){
            $question->B = "NULL";
        }
        else{
            $question->B = $request->input('B');
        }
        //Check for empty input C
        if($request->input('C') == null || $request->input('C') == ""){
            $question->C = "NULL";
        }
        else{
            $question->C = $request->input('C');
        }
        //Check for empty input D
        if($request->input('D') == null || $request->input('D') == ""){
            $question->D = "NULL";
        }
        else{
            $question->D = $request->input('D');
        }
        $question->answer = $request->input('answer');     
        //Check for empty input
        if($request->input('explanation') == null || $request->input('explanation') == ""){
            $question->explanation = "NULL";
        }
        else{
            $question->explanation = $request->input('explanation');
        }
        $quiz_id = $request->input('quiz_id');
        $question->quiz_id = $request->input('quiz_id');
        $question->user_id = auth()->user()->id;
        $question->save();

        return redirect()->action('QuizzesController@edit', ['quiz' => $quiz_id])->with('success', 'Question Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //need proccess
        //$question = Question::find($id);
        //return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Check for user privilege level
        if(auth()->user()->level < 2){
            return redirect('/dashboard')->with('error', 'Unauthorized access');
        }

        $question = Question::find($id);

        //Check for correct user id
        if(auth()->user()->id !== $question->user_id){
            return redirect('/dashboard')->with('error', 'Unauthorized access');
        }

        return view('questions.edit')->with('question', $question);
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
        //Check for user privilege level
        if(auth()->user()->level < 2){
            return redirect('/dashboard')->with('error', 'Unauthorized access');
        }

        $this->validate($request, [
            'title' => 'required',
            'A' => 'required',
            'B' => 'required',
            'C' => 'required',
            'D' => 'required',
            'answer' => 'required',
        ]);

        //find existing question
        $question = Question::find($id);
        $question->title = $request->input('title');
        $question->A = $request->input('A');
        $question->B = $request->input('B');
        $question->C = $request->input('C');
        $question->D = $request->input('D');
        $question->answer = $request->input('answer');     
        //Check for empty input
        if($request->input('explanation') == null || $request->input('explanation') == ""){
            $question->explanation = "NULL";
        }
        else{
            $question->explanation = $request->input('explanation');
        }
        $question->quiz_id = $request->input('quiz_id');
        $question->user_id = auth()->user()->id;
        $question->save();

        return redirect('/dashboard')->with('success', 'Question Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        //Check for user privilege level
        if(auth()->user()->level < 2){
            return redirect('/dashboard')->with('error', 'Unauthorized access');
        }

        //Check for correct user id
        if(auth()->user()->id !== $question->user_id){
            return redirect('/dashboard')->with('error', 'Unauthorized access');
        }

        $question->delete();
        return redirect('/dashboard')->with('success', 'Question Removed');
    }

    public function create_result($quiz_id)
    {

        $quiz = Quiz::find($quiz_id);

        //create a new Question
        $result = new Result;
        $result->count_que = count($quiz->questions);
        $result->quiz_id = $quiz->id;
        $result->user_id = auth()->user()->id;
        $result->save();
        $counting = 0;
        return view('questions.show')->with('questions', $quiz->questions)->with('counting', $counting)->with('result_id', $result->id);
    }

    public function question_next($quiz_id, $counting)
    {
        $quiz = Quiz::find($quiz_id);
        return view('questions.show')->with('questions', $quiz->questions)->with('counting', $counting);
    }

    public function create_question($quiz_id)
    {
        return view('questions.create')->with('quiz_id', $quiz_id);
    }


}
