@extends('layouts.app')

@section('content')
    <h1>Create Question (QID: {{$quiz_id}})</h1>
    {!! Form::open(['action' => 'QuestionsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('A', 'Option A')}}
            {{Form::text('A', '', ['class' => 'form-control', 'placeholder' => 'Option A'])}}
        </div>
        <div class="form-group">
            {{Form::label('B', 'Option B')}}
            {{Form::text('B', '', ['class' => 'form-control', 'placeholder' => 'Option B'])}}
        </div>
        <div class="form-group">
            {{Form::label('C', 'Option C')}}
            {{Form::text('C', '', ['class' => 'form-control', 'placeholder' => 'Option C'])}}
        </div>
        <div class="form-group">
            {{Form::label('D', 'Option D')}}
            {{Form::text('D', '', ['class' => 'form-control', 'placeholder' => 'Option D'])}}
        </div>
        <div class="form-group">
            {{Form::label('answer', 'Answer')}}
            {{Form::text('answer', '', ['class' => 'form-control', 'placeholder' => 'answer'])}}
        </div>
        <div class="form-group">
            {{Form::label('explanation', 'Explanation')}}
            {{Form::text('explanation', '', ['class' => 'form-control', 'placeholder' => 'explanation'])}}
        </div>
        
        {{Form::hidden('quiz_id', $quiz_id)}}

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection