@extends('layouts.app')

@section('content')
    <a href="/colleagues" class="button-contained button-contained label">Go Back</a>
    {!! Form::open(['action' => 'ColleaguesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('email', 'Add Colleague by e-mail')}}
        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Colleague e-mail'])}}
    </div>
    {{Form::submit('Add', ['class' => 'button-contained button-contained label'])}}
    {!! Form::close() !!}
@endsection