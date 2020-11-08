@extends('layouts.app')

@section('content')
        <h3>Are you sure you want to delete this colleague?</h3>
        <div class="jumbotron">
            <img src="{{$colleague->avatar_original}}"><br><br>
            <p>Name: {{$colleague->name}}</p>
            <p>Score: {{$colleague->score}}</p>
        </div>
        {!!Form::open(['action' => ['ColleaguesController@destroy', $colleague->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'button-delete'])}}
        {!!Form::close()!!}
        <a href="/colleagues" class="button-contained button-contained label">Cancel</a>
@endsection