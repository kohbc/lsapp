<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Question;

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
            'A' => 'required',
            'B' => 'required',
            'C' => 'required',
            'D' => 'required',
            'answer' => 'required',
        ]);

        //create a new Question
        $question = new Question;
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

        return redirect('/dashboard')->with('success', 'Question Created');
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
}
