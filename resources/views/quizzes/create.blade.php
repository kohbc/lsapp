@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => 'QuizzesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['class' => 'foo', 'placeholder' => 'Description', 'rows' => 10, 'cols' => 44.75])}}
            {{Form::label('type', 'Quiz Type')}}
            {{Form::text('type', '', ['class' => 'form-control', 'placeholder' => 'Quiz Type'])}}
            {{Form::label('youtube', 'YouTube Video')}}
            {{Form::text('youtube', '', ['class' => 'form-control', 'placeholder' => 'YouTube link here (optional)'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection