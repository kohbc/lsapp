@extends('layouts.app')

@section('content')
    @if($quiz != null)
        <h3>Description: {{$quiz->description}} Type: {{$quiz->type}}</h3>
        @if($quiz->youtube != null)
            <iframe width="345" height="300" src="{{$quiz->youtube}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        @endif
        @if(!Auth::guest())
            <a href="/create_result/{{$quiz->id}}" class="btn btn-primary">
                @if($active == 0)
                    Start New Quiz
                @else
                    Continue Last Quiz
                @endif
            </a>
        @else
            <p>Login to answer this quiz.</p>
        @endif
        <small>Written on {{$quiz->created_at}} by {{$quiz->user->name}}</small><br/>
    @else
        <p>No such quiz exist.</p>
    @endif
@endsection