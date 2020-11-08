@extends('layouts.app')

@section('content')
    <h3>Are you sure you want to delete this question?</h3>
    <div class="jumbotron">
        <p>Question: {{$question->title}}</p>
        <p>Explanation: {{$question->explanation}}</p>
    </div>
    {!!Form::open(['action' => ['QuestionsController@destroy', $question->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'button-delete'])}}
    {!!Form::close()!!}
    <a href="/quizzes/{{$question->quiz->id}}/edit" class="button-contained button-contained label">Cancel</a>
@endsection