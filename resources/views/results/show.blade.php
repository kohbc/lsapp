@extends('layouts.app')

@section('content')
    @if(count($answers) > 0)
        @foreach($answers as $answer)
            <div class=well>
                <h3>{{$answer->question->title}}</h3><br/>
                <div class="form-group">
                    <input type="radio" {{($answer->answer=="A")?"checked":""}} disabled>
                    {{Form::label($answer->question->A)}}
                </div>
                <div class="form-group">
                    <input type="radio" {{($answer->answer=="B")?"checked":""}} disabled>
                    {{Form::label($answer->question->B)}}
                </div>
                <div class="form-group">
                    <input type="radio" {{($answer->answer=="C")?"checked":""}} disabled>
                    {{Form::label($answer->question->C)}}
                </div>
                <div class="form-group">
                    <input type="radio" {{($answer->answer=="D")?"checked":""}} disabled>
                    {{Form::label($answer->question->D)}}
                </div>
                @if($active != 1)
                    @if($answer->mark == 1)
                        <small>Correct</small>
                    @else
                        <small>Wrong</small>
                    @endif
                    <br/>
                @endif
                <small>Submitted on {{$answer->created_at}}</small><br/>
            </div>
        @endforeach
    @else
        <p>No answers found</p>
    @endif
    @if($active == 1)
    <p>This Quiz is ongoing</p>
    <a href="/quizzes/{{$quiz_id}}" class="btn btn-primary">Continue this Quiz</a>
    @endif
@endsection