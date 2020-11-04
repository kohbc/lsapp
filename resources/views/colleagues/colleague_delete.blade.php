@extends('layouts.app')

@section('content')
        <h3>Are you sure you want to delete this collague?</h1>
        <img src="{{$colleague->avatar_original}}">
        <h1>Name: {{$colleague->name}}</h1><br/>
        <h1>Score: {{$colleague->score}}</h1><br/>
        {!!Form::open(['action' => ['ColleaguesController@destroy', $colleague->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        <a href="/colleagues" class="btn btn-default">Go Back</a>
@endsection