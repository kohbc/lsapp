@extends('layouts.app')

@section('content')
    <a href="/answers" class="btn btn-default">Go Back</a>
    <h1>{{$answer->quiz->title}}</h1>
    <div class=well>
        <h3>{{$answer->quiz->Q_1}}</h3><br/>
        <div class="form-group">
            @if($answer->Q_1Answer == "A")
                <input type="radio" name="Q_1Answer" checked disabled>
            @else
                <input type="radio" name="Q_1Answer" disabled>
            @endif
            {{Form::label($answer->quiz->Q_1A)}}
        </div>
        <div class="form-group">
            @if($answer->Q_1Answer == "B")
                <input type="radio" name="Q_1Answer" checked disabled>
            @else
                <input type="radio" name="Q_1Answer" disabled>
            @endif
            {{Form::label($answer->quiz->Q_1B)}}
        </div>
        <div class="form-group">
            @if($answer->Q_1Answer == "C")
                <input type="radio" name="Q_1Answer" checked disabled>
            @else
                <input type="radio" name="Q_1Answer" disabled>
            @endif
            {{Form::label($answer->quiz->Q_1C)}}
        </div>
        <div class="form-group">
            @if($answer->Q_1Answer == "D")
                <input type="radio" name="Q_1Answer" checked disabled>
            @else
                <input type="radio" name="Q_1Answer" disabled>
            @endif
            {{Form::label($answer->quiz->Q_1D)}}
        </div>
    </div>
    <small>Submitted on {{$answer->created_at}}</small><br/>
@endsection