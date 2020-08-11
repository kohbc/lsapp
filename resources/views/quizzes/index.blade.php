@extends('layouts.app')

@section('content')
    <h1>Quizzes</h1>
    @if(count($quizzes) > 0)
        @foreach($quizzes as $quiz)
        <div class=well>
        <h3><a href="/quizzes/{{$quiz->id}}">{{$quiz->title}}</a></h3>
            <small>Written on {{$quiz->created_at}} by {{$quiz->user->name}}</small>
        </div>
        @endforeach
    @else
        <p>No quiz found</p>
    @endif
@endsection