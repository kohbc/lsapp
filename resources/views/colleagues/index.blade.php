@extends('layouts.app')

@section('content')
{!! Form::open(['action' => 'ColleaguesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('email', 'Add Colleague by e-mail')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Colleague e-mail'])}}
        </div>
        {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
    @if(count($colleagues) > 0)
        @foreach($colleagues as $colleague)
            <div class=well>
                <h3>{{$colleague->colleague_name}} ({{$colleague->colleague_score}})</h3> 
            </div>
        @endforeach
    @else
        <p>No colleagues found</p>
    @endif
@endsection