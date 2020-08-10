<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Quiz;

class QuizzesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::orderBy('created_at', 'desc')->paginate(5);
        return view('quizzes.index')->with('quizzes', $quizzes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $this->validate($request, [
            'title' => 'required',
            'Q_1' => 'required',
            'Q_1A' => 'required',
            'Q_1B' => 'required',
            'Q_1C' => 'required',
            'Q_1D' => 'required',
            'Q_1Answer' => 'required'
        ]);

        //create a new Quiz
        $quiz = new Quiz;
        $quiz->title = $request->input('title');
        $quiz->Q_1 = $request->input('Q_1');
        $quiz->Q_1A = $request->input('Q_1A');
        $quiz->Q_1B = $request->input('Q_1B');
        $quiz->Q_1C = $request->input('Q_1C');
        $quiz->Q_1D = $request->input('Q_1D');
        $quiz->Q_1Answer = $request->input('Q_1Answer');
        $quiz->user_id = auth()->user()->id;
        $quiz->save();

        return redirect('/quizzes')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);
        return view('quizzes.show')->with('quiz', $quiz);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        return view('quizzes.edit')->with('quiz', $quiz);
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
        $this->validate($request, [
            'title' => 'required',
            'Q_1' => 'required',
            'Q_1A' => 'required',
            'Q_1B' => 'required',
            'Q_1C' => 'required',
            'Q_1D' => 'required',
            'Q_1Answer' => 'required'
        ]);

        //create a new quiz
        $quiz = Quiz::find($id);
        $quiz->title = $request->input('title');
        $quiz->Q_1 = $request->input('Q_1');
        $quiz->Q_1A = $request->input('Q_1A');
        $quiz->Q_1B = $request->input('Q_1B');
        $quiz->Q_1C = $request->input('Q_1C');
        $quiz->Q_1D = $request->input('Q_1D');
        $quiz->Q_1Answer = $request->input('Q_1Answer');
        $quiz->save();

        return redirect('/quizzes')->with('success', 'Quiz Updated');
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
        $quiz->delete();
        return redirect('/quizzes')->with('success', 'Quiz Removed');
    }
}
