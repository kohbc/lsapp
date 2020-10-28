@extends('layouts.app')
@section('content')
    <h1>Your Results</h1>
    @if(count($results) > 0)
        @foreach($results as $result)
        <div class=well>
            <h3><a href="/results/{{$result->id}}">Quiz Title: "{{$result->quiz->title}}"</a></h3><br/>
            <h5>{{$result->mark}}/{{$result->count_que}}</h5>

            <small>Answered on {{$result->created_at}}</small>
        </div>
        @endforeach
    @else
        <p>No result found</p>
    @endif
@endsection