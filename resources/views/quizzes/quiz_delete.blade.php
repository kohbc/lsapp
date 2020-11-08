@extends('layouts.app')

@section('content')
    <h3>Are you sure you want to delete this quiz?</h3>
    <div class="jumbotron">
        <p>Quiz: {{$quiz->title}}</p>
        <p>Type: {{$quiz->type}}</p>
        <p>Description: {{$quiz->description}}</p>
    </div>
    {!!Form::open(['action' => ['QuizzesController@destroy', $quiz->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'button-delete'])}}
    {!!Form::close()!!}
    <a href="/dashboard" class="button-contained button-contained label">Cancel</a>
@endsection