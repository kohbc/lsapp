@extends('layouts.app')

@section('content')
    @if($colleague != null)
        <img src="{{$colleague->avatar_original}}" class="list item image-list image">
        <p class="list item label">{{$colleague->name}}</p>
        <small>Became colleague on {{$colleague->created_at}}</small><br/>
    @else
        <p>No such colleague exist.</p>
    @endif
@endsection