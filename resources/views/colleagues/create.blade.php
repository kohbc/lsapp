@extends('layouts.app')

@section('content')
    <a href="/colleagues" class="btn btn-default">Go Back</a>
    {!! Form::open(['action' => 'ColleaguesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('email', 'Add Colleague by e-mail')}}
        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Colleague e-mail'])}}
    </div>
    {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection