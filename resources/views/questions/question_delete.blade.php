@extends('layouts.app')

@section('content')
    
        <h3>Are you sure you want to delete this question?</h1>
        <h1>Question: {{$question->title}}</h1><br/>
        <h1>Explanation: {{$question->explanation}}</h1><br/>
        {!!Form::open(['action' => ['QuestionsController@destroy', $question->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        <a href="/quizzes/{{$question->quiz->id}}/edit" class="button-contained button-contained label">Go Back</a>
@endsection