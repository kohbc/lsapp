@extends('layouts.app')

@section('content')
    <h1>Edit Question</h1>
    {!! Form::open(['action' => ['QuestionsController@update', $question->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $question->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            <input type="radio" name="answer" value="A" class="myRadio" {{($question->answer=="A")?"checked":""}}>
            {{Form::text('A', $question->A, ['class' => 'foo2', 'placeholder' => 'A', 'rows' => 10, 'cols' => 35])}}
        </div>
        <div class="form-group">
            <input type="radio" name="answer" value="B" class="myRadio" {{($question->answer=="B")?"checked":""}}>
            {{Form::text('B', $question->B, ['class' => 'foo2', 'placeholder' => 'B', 'rows' => 10, 'cols' => 35])}}
        </div>
        <div class="form-group">
            <input type="radio" name="answer" value="C" class="myRadio" {{($question->answer=="C")?"checked":""}}>
            {{Form::text('C', $question->C, ['class' => 'foo2', 'placeholder' => 'C', 'rows' => 10, 'cols' => 35])}}
        </div>
        <div class="form-group">
            <input type="radio" name="answer" value="D" class="myRadio" {{($question->answer=="D")?"checked":""}}>
            {{Form::text('D', $question->D, ['class' => 'foo2', 'placeholder' => 'D', 'rows' => 10, 'cols' => 35])}}
        </div>
        <div class="form-group">
            {{Form::label('explanation', 'Explanation')}}
            {{Form::text('explanation', $question->explanation, ['class' => 'form-control', 'placeholder' => 'explanation'])}}
        </div>
        {{Form::hidden('quiz_id', $question->quiz_id)}}
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    @endsection