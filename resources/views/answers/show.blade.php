@extends('layouts.app')

@section('content')
    <a href="/answers" class="btn btn-default">Go Back</a>
    <h1>{{$answer->quiz_id}}</h1>
    <div class=well>
        <h3>{{$answer->Q_1Answer}}</h3>
        <h3>{{$answer->mark}}</h3>
    </div>
    <small>Written on {{$answer->created_at}}</small><br/>
@endsection