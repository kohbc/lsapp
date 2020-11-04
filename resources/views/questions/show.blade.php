@extends('layouts.app')

@section('content')
    @if(count($questions) > 0 && count($questions) > $counting)
        <div style="display: none;">
            {{$question = $questions->skip($counting)->first()}}
            {{$answer = $result->answers->skip($counting)->first()}}
        </div>
        {!! Form::open(['action' => 'AnswersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <h1>{{$question->title}}</h1>
            <div class="form-group">
                @if($answer == null)
                    {{Form::radio('MCQ', 'A')}}
                @else
                    {{Form::radio('MCQ', 'A', ($answer->answer == 'A' ? true : false))}}
                @endif
                {{Form::label($question->A)}}
            </div>
            <div class="form-group">
                @if($answer == null)
                    {{Form::radio('MCQ', 'B')}}
                @else
                    {{Form::radio('MCQ', 'B', ($answer->answer == 'B' ? true : false))}}
                @endif
                {{Form::label($question->B)}}
            </div>
            <div class="form-group">
                @if($answer == null)
                    {{Form::radio('MCQ', 'C')}}
                @else
                    {{Form::radio('MCQ', 'C', ($answer->answer == 'C' ? true : false))}}
                @endif
                {{Form::label($question->C)}}
            </div>
            <div class="form-group">
                @if($answer == null)
                    {{Form::radio('MCQ', 'D')}}
                @else
                    {{Form::radio('MCQ', 'D', ($answer->answer == 'D' ? true : false))}}
                @endif
                {{Form::label($question->D)}}
            </div>
            {{Form::hidden('quiz_id', $question->quiz_id)}}
            {{Form::hidden('question_id', $question->id)}}
            {{Form::hidden('question_answer', $question->answer)}}
            {{Form::hidden('result_id', $result->id)}}
            {{Form::hidden('counting', $counting)}}
            @if($answer == null)
                {{Form::hidden('answer_id', null)}}
            @else
                {{Form::hidden('answer_id', $answer->id)}}
            @endif
            <div class="button-contained">
                {{Form::submit('Save and Next', ['class' => 'button-contained label-text'])}}
            </div>
        {!! Form::close() !!}
    @else
        <p>End of the quiz</p>
        <a href="/finish/{{$result->id}}" class="button-contained button-contained label">Finish the Quiz</a>
    @endif
@endsection