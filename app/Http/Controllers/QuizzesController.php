<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Quiz;
use App\Result;

class QuizzesController extends Controller
{
    /**
     * Create a new controller instance.
     * Allow guest account to access index or show only
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::orderBy('type', 'asc')->get();
        // $quizzes = Quiz::orderBy('type', 'desc')->paginate(5);
        return view('quizzes.index')->with('quizzes', $quizzes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Check for user privilege level before proceed
        if(auth()->user()->level < 2){
            return redirect('/quizzes')->with('error', 'Unauthorized access');
        }
        return view('quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Check for user privilege level before proceed
        if(auth()->user()->level < 2){
            return redirect('/quizzes')->with('error', 'Unauthorized access');
        }

        $this->validate($request, [
            'title' => 'required',
            'type' => 'required'
        ]);

        //create a new Quiz
        $quiz = new Quiz;
        $quiz->title = $request->input('title');
        $quiz->description = $request->input('description');
        $quiz->description = $request->input('description');
        $quiz->type = $request->input('type');
        $quiz->youtube = $request->input('youtube');
        $quiz->user_id = auth()->user()->id;
        $quiz->save();

        return redirect('/dashboard')->with('success', 'Quiz Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = auth()->user()->id;
        $quiz = Quiz::find($id);

        //Check for any ongoing quiz
        $result = Result::where('user_id', $user_id)->where('quiz_id', $quiz->id)->where('active', 1)->first();
        if($result == null){
            $active = 0;
        }
        else{
            $active = 1;
        }

        return view('quizzes.show')->with('quiz', $quiz)->with('active', $active);
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
            return redirect('/quizzes')->with('error', 'Unauthorized access');
        }

        $quiz = Quiz::find($id);

        //Check for correct user id
        if(auth()->user()->id !== $quiz->user_id){
            return redirect('/quizzes')->with('error', 'Unauthorized access');
        }

        return view('quizzes.edit')->with('quiz', $quiz)->with('questions', $quiz->questions);
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
            return redirect('/quizzes')->with('error', 'Unauthorized access');
        }

        $this->validate($request, [
            'title' => 'required',
            'type' => 'required'
        ]);

        //find existing quiz
        $quiz = Quiz::find($id);

        //Check for correct user id
        if(auth()->user()->id !== $quiz->user_id){
            return redirect('/quizzes')->with('error', 'Unauthorized access');
        }

        $quiz->title = $request->input('title');
        $quiz->youtube = $request->input('youtube');
        $quiz->user_id = auth()->user()->id;
        $quiz->save();

        return redirect('/dashboard')->with('success', 'Quiz Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id);

        //Check for user privilege level
        if(auth()->user()->level < 2){
            return redirect('/quizzes')->with('error', 'Unauthorized access');
        }

        //Check for correct user id
        if(auth()->user()->id !== $quiz->user_id){
            return redirect('/quizzes')->with('error', 'Unauthorized access');
        }

        //Start deleting starting from Answers > Questions > Results > Quiz
        $questions = $quiz->questions;
        foreach ($questions as $question){
            $answers = $question->answers;
            foreach ($answers as $answer){
                $answer->delete();
            }
            $question->delete();
        }

        $results = $quiz->results;
        foreach ($results as $result){
            $result->delete();
        }

        $quiz->delete();
        return redirect('/dashboard')->with('success', 'Quiz Removed');
    }

    //A confirmation page before calling delete function
    public function quiz_delete($quiz_id)
    {
        $quiz = Quiz::find($quiz_id);

        if($quiz == null){
            return redirect('/dashboard')->with('error', 'No such quiz');
        }

        //Check for correct user id
        if(auth()->user()->id !== $quiz->user_id){
            return redirect('/dashboard')->with('error', 'Unauthorized access');
        }

        return view('quizzes.quiz_delete')->with('quiz', $quiz);
    }
}
