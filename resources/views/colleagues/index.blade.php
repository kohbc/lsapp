<?php
use App\User;
?>
@extends('layouts.app')

@section('content')
    <a href="/colleagues/create" class="button-contained button-contained label">Add new Colleague</a>
    @if(count($colleagues) > 0)
        <div class="list">
            @foreach($colleagues as $colleague)
                <div style="display: none;">
                    {{$user = User::find($colleague->colleague_id)}}
                </div>
                <div class="list item">
                    <img src="{{$user->avatar}}" class="list item image-list image">
                    <p class="list item label">{{$user->name}}</p>
                    <p class="list item image-list context" style="right:113px;">Score: {{$user->score}}</p>
                    <a href="/colleague_delete/{{$user->id}}">
                        <img src="/storage/cover_image/baseline_clear_black_18dp.png" class="list item icon" alt="delete friend">
                    </a>
                    <hr class="list item divider">
                </div><br><br><br><br>
            @endforeach
        </div>
    @else
        <p>No colleagues found</p>
    @endif
@endsection