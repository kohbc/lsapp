@extends('layouts.app')

@section('content')
    @if($colleague != null)
        <img src="{{$colleague->avatar_original}}">
        <h3>Name: {{$colleague->name}}</h3>
        <small>Became colleague on {{$colleague->created_at->format('Y-m-d')}} {{$colleague->created_at->format('H:i')}}</small><br/>
    @else
        <p>No such colleague exist.</p>
    @endif
@endsection