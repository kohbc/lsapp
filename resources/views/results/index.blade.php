@extends('layouts.app')
@section('content')
    <h1>Your Results</h1>
    @if(count($results) > 0)
        @foreach($results as $result)
        <div class=well>
            <h3><a href="/results/{{$result->id}}">Quiz Title: "{{$result->quiz->title}}"</a></h3><br/>
            @if($result->active == 1)
                <h5>Quiz Ongoing</h5>
            @else
                <h5>{{$result->mark}}/{{$result->count_que}}</h5>
            @endif
            <small>Answered on {{$result->created_at}}</small>
        </div>
        @endforeach
    @else
        <p>No result found</p>
    @endif
@endsection