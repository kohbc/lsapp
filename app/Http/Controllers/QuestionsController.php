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
            'answer' => 'required'
        ]);

        //create a new Question
        $question = new Question;
        $question->title = $request->input('title');
        $question->A = $request->input('A');
        $question->B = $request->input('B');
        $question->C = $request->input('C');
        $question->D = $request->input('D');
        $question->answer = $request->input('answer');     
        $question->explanation = $request->input('explanation');
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
            'answer' => 'required'
        ]);

        //find existing question
        $question = Question::find($id);
        $question->title = $request->input('title');
        $question->A = $request->input('A');
        $question->B = $request->input('B');
        $question->C = $request->input('C');
        $question->D = $request->input('D');
        $question->answer = $request->input('answer');     
        $question->explanation = $request->input('explanation');
        $question->quiz_id = $request->input('quiz_id');
        $question->user_id = auth()->user()->id;
        $question->save();

        $quiz_id = $question->quiz_id;
        return redirect()->action('QuizzesController@edit', ['quiz' => $quiz_id])->with('success', 'Question Updated');
        //return redirect('/dashboard')->with('success', 'Question Updated');
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
        $quiz_id = $question->quiz_id;

        //Check for user privilege level
        if(auth()->user()->level < 2){
            return redirect('/dashboard')->with('error', 'Unauthorized access');
        }

        //Check for correct user id
        if(auth()->user()->id !== $question->user_id){
            return redirect('/dashboard')->with('error', 'Unauthorized access');
        }

        $answers = $question->answers;
        foreach ($answers as $answer){
            //update results
            $answer->result->count_que = $answer->result->count_que - 1;
            if($answer->mark == 1){
                $answer->result->mark = $answer->result->mark - 1;
            }
            $answer->result->save();
            $answer->delete();
        }

        $question->delete();

        return redirect()->action('QuizzesController@edit', ['quiz' => $quiz_id])->with('success', 'Question Deleted');
        //return redirect('/dashboard')->with('success', 'Question Removed');
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
        return view('questions.show')->with('questions', $quiz->questions)->with('counting', $counting)->with('quiz', $quiz);
    }

    public function create_question($quiz_id)
    {
        return view('questions.create')->with('quiz_id', $quiz_id);
    }


}
