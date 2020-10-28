@extends('layouts.app')

@section('content')
    <a href="/results" class="btn btn-default">Go Back</a>
    @if(count($answers) > 0)
        @foreach($answers as $answer)
            <div class=well>
                <h3>{{$answer->question->title}}</h3><br/>
                <div class="form-group">
                    @if($answer->answer == "A")
                        <input type="radio" checked disabled>
                    @else
                        <input type="radio" disabled>
                    @endif
                    {{Form::label($answer->question->A)}}
                </div>
                <div class="form-group">
                    @if($answer->answer == "B")
                        <input type="radio" checked disabled>
                    @else
                        <input type="radio" disabled>
                    @endif
                    {{Form::label($answer->question->B)}}
                </div>
                <div class="form-group">
                    @if($answer->answer == "C")
                        <input type="radio" checked disabled>
                    @else
                        <input type="radio" disabled>
                    @endif
                    {{Form::label($answer->question->C)}}
                </div>
                <div class="form-group">
                    @if($answer->answer == "D")
                        <input type="radio" checked disabled>
                    @else
                        <input type="radio" disabled>
                    @endif
                    {{Form::label($answer->question->D)}}
                </div>
                @if($answer->mark == 1)
                    <small>Correct</small><br/>
                @else
                    <small>Wrong</small><br/>
                @endif
                <small>Submitted on {{$answer->created_at}}</small><br/>
            </div>
        @endforeach
    @else
        <p>No answers found</p>
    @endif

@endsection