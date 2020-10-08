@extends('layouts.app')

@section('content')
    <h1>Create Quiz</h1>
    {!! Form::open(['action' => 'QuizzesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['class' => 'foo', 'placeholder' => 'Description', 'rows' => 10, 'cols' => 44.75])}}
            {{Form::label('youtube', 'YouTube Video')}}
            {{Form::text('youtube', '', ['class' => 'form-control', 'placeholder' => 'YouTube link here (optional)'])}}
        </div>
        <div class="form-group">
            {{Form::label('question', 'Question')}}
            {{Form::text('question', '', ['class' => 'form-control', 'placeholder' => 'Question'])}}
        </div>
        <div class="form-group">
            {{Form::radio('answer', 'A', false, ['class' => 'myRadio'])}}
            {{Form::text('A', '', ['class' => 'foo2', 'placeholder' => 'A', 'rows' => 10, 'cols' => 35])}}
        </div>
        <div class="form-group">
            {{Form::radio('answer', 'B', false, ['class' => 'myRadio'])}}
            {{Form::text('B', '', ['class' => 'foo2', 'placeholder' => 'B', 'rows' => 10, 'cols' => 35])}}
        </div>
        <div class="form-group">
            {{Form::radio('answer', 'C', false, ['class' => 'myRadio'])}}
            {{Form::text('C', '', ['class' => 'foo2', 'placeholder' => 'C', 'rows' => 10, 'cols' => 35])}}
        </div>
        <div class="form-group">
            {{Form::radio('answer', 'D', false, ['class' => 'myRadio'])}}
            {{Form::text('D', '', ['class' => 'foo2', 'placeholder' => 'D', 'rows' => 10, 'cols' => 35])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection