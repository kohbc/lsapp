@extends('layouts.app')

@section('content')
    <a href="/quizzes" class="btn btn-default">Go Back</a>
    <h1>{{$quiz->title}}</h1>
    <!--
    <div class=well>
        <form>
            <h3>{{$quiz->Q_1}}</h3>
            <input type="radio" name="Q_1" id="Q_1A" value="A"/><label for="Q_1A">{{$quiz->Q_1A}}</label><br/>
            <input type="radio" name="Q_1" id="Q_1B" value="B"/><label for="Q_1B">{{$quiz->Q_1B}}</label><br/>
            <input type="radio" name="Q_1" id="Q_1C" value="C"/><label for="Q_1C">{{$quiz->Q_1C}}</label><br/>
            <input type="radio" name="Q_1" id="Q_1D" value="D"/><label for="Q_1D">{{$quiz->Q_1D}}</label><br/>
            <input type="submit" value="Submit"/>
        </form>
    </div>
    -->
    {!! Form::open(['action' => 'AnswersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::radio('Q_1Answer', 'A')}}
            {{Form::label($quiz->Q_1A)}}
        </div>
        <div class="form-group">
            {{Form::radio('Q_1Answer', 'B')}}
            {{Form::label($quiz->Q_1B)}}
        </div>
        <div class="form-group">
            {{Form::radio('Q_1Answer', 'C')}}
            {{Form::label($quiz->Q_1C)}}
        </div>
        <div class="form-group">
            {{Form::radio('Q_1Answer', 'D')}}
            {{Form::label($quiz->Q_1D)}}
        </div>
        <div class="form-group">
            {{Form::hidden('quiz_id', $quiz->id)}}
            {{Form::hidden('mark', 0)}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

    <small>Written on {{$quiz->created_at}} by {{$quiz->user->name}}</small><br/>
    @if(!Auth::guest())
        @if(Auth::user()->id == $quiz->user_id)
            <a href="/quizzes/{{$quiz->id}}/edit" class="btn btn-default">Edit</a>
            {!!Form::open(['action' => ['QuizzesController@destroy', $quiz->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection