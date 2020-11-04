@extends('layouts.app')

@section('content')
    
        <h3>Are you sure you want to delete this quiz?</h1>
        <h1>Quiz: {{$quiz->title}}</h1><br/>
        <h1>Type: {{$quiz->type}}</h1><br/>
        <h1>Description: {{$quiz->description}}</h1><br/>
        {!!Form::open(['action' => ['QuizzesController@destroy', $quiz->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        <a href="/dashboard" class="button-contained button-contained label">Go Back</a>
@endsection