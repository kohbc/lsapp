<?php
use App\User;
?>
@extends('layouts.app')

@section('content')
    @if(count($colleagues) > 0)
        @foreach($colleagues as $colleague)
            <div class=well>
                <div style="display: none;">
                    {{$user = User::find($colleague->colleague_id)}}
                </div>
                <tr>
                    <td>{{$user->avatar}}</td>
                    <td><a href="/colleagues/{{$user->id}}">{{$user->name}}</a></td>
                    <td>{{$user->score}}</td>
                    <td><a href="/colleague_delete/{{$user->id}}" class="btn btn-default">Delete</a></td>
                </tr>
            </div>
        @endforeach
    @else
        <p>No colleagues found</p>
    @endif
    <a href="/colleagues/create" class="btn btn-default">Add new Colleague</a>
@endsection