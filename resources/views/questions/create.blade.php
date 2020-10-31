@extends('layouts.app')

@section('content')
    <h1>Create Question</h1>
    {!! Form::open(['action' => 'QuestionsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
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
        <div class="form-group">
            {{Form::label('explanation', 'Explanation')}}
            {{Form::text('explanation', '', ['class' => 'form-control', 'placeholder' => 'explanation'])}}
        </div>
        
        {{Form::hidden('quiz_id', $quiz_id)}}

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection