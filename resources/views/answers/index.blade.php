@extends('layouts.app')

@section('content')
    <h1>Answers</h1>
    @if(count($answers) > 0)
        @foreach($answers as $answer)
        <div class=well>
        <h3><a href="/answers/{{$answer->id}}">{{$answer->quiz_id}} answered by {{$answer->user_id}}</a></h3>
            <small>Written on {{$answer->created_at}}</small>
        </div>
        @endforeach
    @else
        <p>No quiz found</p>
    @endif
@endsection