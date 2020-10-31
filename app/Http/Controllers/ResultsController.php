<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Quiz;
use App\Result;

class ResultsController extends Controller
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
        return view('results.index')->with('results', $user->results); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Result::find($id);
        $quiz_id = $result->quiz->id;

        //Check for correct user id
        if(auth()->user()->id !== $result->user_id){
            return redirect('/answers')->with('error', 'Unauthorized access');
        }

        return view('results.show')->with('answers', $result->answers)->with('quiz_id', $quiz_id)->with('active', $result->active);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function create_result($quiz_id)
    {
        //look for active session of ongoing quiz
        $user_id = auth()->user()->id;
        $quiz = Quiz::find($quiz_id);
        $result = Result::where('user_id', $user_id)->where('quiz_id', $quiz_id)->where('active', 1)->first();

        //create a new Result if no active session exist
        if($result == null){
            $result = new Result;
            $result->count_que = count($quiz->questions);
            $result->quiz_id = $quiz->id;
            $result->user_id = $user_id;
            $result->active = 1;
            $result->save();
        }
        $counting = 0;
        return view('questions.show')->with('questions', $quiz->questions)->with('counting', $counting)->with('result', $result);
    }

    public function finish($result_id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $result = Result::find($result_id);

        $quiz_id = $result->quiz_id;
        $mark = 0;
        $count_que = 0;

        $has_ace = Result::where('user_id', $user_id)->where('quiz_id', $quiz_id)->where('ace', 1)->first();

        $result = Result::find($result_id);
        $answers = $result->answers;
        foreach($answers as $answer){
            $mark = $mark + $answer->mark;
            $count_que = $count_que + 1;
        }
        $result->mark = $mark;
        $result->count_que = $count_que;

        $message = 'Quiz finish';
        if($mark == $count_que){
            $message = 'Quiz finish. No more points gained due to previous ace result';
            //if there is no existing ace result, user gain points
            if($has_ace == null){
                $user->score = $user->score + 100;
                $user->save();
                $message = 'Quiz finish. Gain points for first ace result';
            }
            $result->ace = 1;
        }
        $result->active = 0;
        $result->save();

        return redirect('/results')->with('success', $message);
    }
}
