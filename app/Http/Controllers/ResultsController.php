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
        return view('results.index')->with('results', $user->results); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //No Create function for Results
        //Replaced by ResultsController@create_result function
        return redirect('/results')->with('error', 'Page no found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //No Create function for Results
        //Replaced by ResultsController@create_result function
        return redirect('/results')->with('error', 'Page no found');
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
            return redirect('/results')->with('error', 'Unauthorized access');
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
        //No Edit function for Results
        //Replaced by ResultsController@finish function
        return redirect('/results')->with('error', 'Page no found');
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
        //No Update function for Results
        //Replaced by ResultsController@finish function
        return redirect('/results')->with('error', 'Page no found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //No Delete function for Results
        return redirect('/results')->with('error', 'Page no found');
    }

    public function create_result($quiz_id)
    {
        $quiz = Quiz::find($quiz_id);

        //Check if the quiz exist
        if($quiz == null){
            return redirect('/quizzes')->with('error', 'No such Quiz exist');
        }

        //Look for active session of ongoing quiz
        $user_id = auth()->user()->id;
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

        //question count start at 0
        $counting = 0;

        return view('questions.show')->with('questions', $quiz->questions)->with('counting', $counting)->with('result', $result);
    }

    //Finalize the marks and change the quiz session from 'ongoing' to 'finished'
    public function finish($result_id)
    {
        $result = Result::find($result_id);
        $user_id = auth()->user()->id;
        
        //Check for correct user id
        if($user_id !== $result->user_id){
            return redirect('/results')->with('error', 'Unauthorized access');
        }

        $user = User::find($user_id);

        $quiz_id = $result->quiz_id;
        $mark = 0;
        $count_que = 0;

        //Check for any pre-existed ace result
        $has_ace = Result::where('user_id', $user_id)->where('quiz_id', $quiz_id)->where('ace', 1)->first();

        //Check out all answers from the same result, count the total marks
        $answers = $result->answers;
        foreach($answers as $answer){
            $mark = $mark + $answer->mark;
            $count_que = $count_que + 1;
        }

        //Update the result
        $result->mark = $mark;
        $result->count_que = $count_que;

        $message = 'Quiz finish';

        //Check for ace result
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

        //Change result status from 'ongoing' to 'finished'
        $result->active = 0;
        $result->save();

        return redirect('/results')->with('success', $message);
    }
}
