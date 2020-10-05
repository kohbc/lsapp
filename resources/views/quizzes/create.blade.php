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
        <div class="form-group">
            {{Form::label('Q_1', 'Quiz 1')}}
            {{Form::text('Q_1', '', ['class' => 'form-control', 'placeholder' => 'Quiz 1 question'])}}
        </div>
        <div class="form-group">
            {{Form::label('Q_1A', 'Quiz 1 Option A')}}
            {{Form::text('Q_1A', '', ['class' => 'form-control', 'placeholder' => 'Quiz 1 A'])}}
        </div>
        <div class="form-group">
            {{Form::label('Q_1B', 'Quiz 1 Option B')}}
            {{Form::text('Q_1B', '', ['class' => 'form-control', 'placeholder' => 'Quiz 1 B'])}}
        </div>
        <div class="form-group">
            {{Form::label('Q_1C', 'Quiz 1 Option C')}}
            {{Form::text('Q_1C', '', ['class' => 'form-control', 'placeholder' => 'Quiz 1 C'])}}
        </div>
        <div class="form-group">
            {{Form::label('Q_1D', 'Quiz 1 Option D')}}
            {{Form::text('Q_1D', '', ['class' => 'form-control', 'placeholder' => 'Quiz 1 D'])}}
        </div>
        <div class="form-group">
            {{Form::label('Q_1Answer', 'Quiz 1 Answer')}}
            {{Form::text('Q_1Answer', '', ['class' => 'form-control', 'placeholder' => 'Quiz 1 Answer'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection