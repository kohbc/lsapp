@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => 'ColleaguesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('email', 'Add Colleague by e-mail')}}
        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Colleague e-mail'])}}
    </div>
    <div class="button-contained">
        {{Form::submit('Add', ['class' => 'button-contained label-text'])}}
    </div>
    {!! Form::close() !!}
@endsection