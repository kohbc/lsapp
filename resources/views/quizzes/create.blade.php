@extends('layouts.app')

@section('content')
    <h1>Create Quiz</h1>
    {!! Form::open(['action' => 'QuizzesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('youtube', 'YouTube Video')}}
            {{Form::text('youtube', '', ['class' => 'form-control', 'placeholder' => 'YouTube link here (optional)'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection