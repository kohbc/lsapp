@extends('layouts.app')

@section('content')
    @if(count($questions) > 0 && count($questions) > $counting)
        <div style="display: none;">{{$question = $questions->skip($counting)->first()}}</div>
        {!! Form::open(['action' => 'AnswersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <h1>{{$question->title}}</h1>
            <div class="form-group">
                {{Form::radio('MCQ', 'A')}}
                {{Form::label($question->A)}}
            </div>
            <div class="form-group">
                {{Form::radio('MCQ', 'B')}}
                {{Form::label($question->B)}}
            </div>
            <div class="form-group">
                {{Form::radio('MCQ', 'C')}}
                {{Form::label($question->C)}}
            </div>
            <div class="form-group">
                {{Form::radio('MCQ', 'D')}}
                {{Form::label($question->D)}}
            </div>
            {{Form::hidden('quiz_id', $question->quiz_id)}}
            {{Form::hidden('question_id', $question->id)}}
            {{Form::hidden('question_answer', $question->answer)}}
            {{Form::hidden('counting', $counting)}}
            {{Form::hidden('result_id', $result_id)}}
            {{Form::submit('Next', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    @else
        <p>End of the quiz</p>
        <a href="/results" class="btn btn-primary">Finish</a>
    @endif
@endsection