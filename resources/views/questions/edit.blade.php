@extends('layouts.app')

@section('content')
    <h1>Edit Question</h1>
    {!! Form::open(['action' => ['QuestionsController@update', $question->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $question->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('A', 'Option A')}}
            {{Form::text('A', $question->A, ['class' => 'form-control', 'placeholder' => 'Option A'])}}
        </div>
        <div class="form-group">
            {{Form::label('B', 'Option B')}}
            {{Form::text('B', $question->B, ['class' => 'form-control', 'placeholder' => 'Option B'])}}
        </div>
        <div class="form-group">
            {{Form::label('C', 'Option C')}}
            {{Form::text('C', $question->C, ['class' => 'form-control', 'placeholder' => 'Option C'])}}
        </div>
        <div class="form-group">
            {{Form::label('D', 'Option D')}}
            {{Form::text('D', $question->D, ['class' => 'form-control', 'placeholder' => 'Option D'])}}
        </div>
        <div class="form-group">
            {{Form::label('answer', 'Answer')}}
            {{Form::text('answer', $question->answer, ['class' => 'form-control', 'placeholder' => 'answer'])}}
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