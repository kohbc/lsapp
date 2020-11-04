@extends('layouts.app')

@section('content')
    @if($colleague != null)
        <h3>Name: {{$colleague->avatar_original}}</h3>
        <h3>Name: {{$colleague->name}}</h3>
        <small>Became colleague on {{$colleague->created_at}}</small><br/>
    @else
        <p>No such colleague exist.</p>
    @endif
@endsection