<?php
use App\User;
?>
@extends('layouts.app')

@section('content')
    <a href="/colleagues/create" class="button-contained button-contained label" style="margin-left:82.5px;">Add new Colleague</a>
    <br>
    @if(count($colleagues) > 0)
    <!-- KOH -->
        <div class="list">
            @foreach($colleagues as $colleague)
                <div class="list item">
                    <div style="display: none;">
                        {{$user = User::find($colleague->colleague_id)}}
                    </div>
                    <tr>
                        <td><img src="{{$user->avatar}}" class="list item image-list image"></td>
                        <td><a href="/colleagues/{{$user->id}}" class="list item label">{{$user->name}}</a></td>
                        <td><p class="list item image-list context" style="right:103px;">Score: {{$user->score}}</p></td>
                        <td><a href="/colleague_delete/{{$user->id}}" class="list item icon"><img src="/storage/cover_image/baseline_clear_black_18dp.png" style="width:24px;height:24px;" alt="delete friend"></a></td>
                    </tr>
                    <hr class="list item divider">
                </div><br><br><br><br>
            @endforeach
        </div>
<!--
        <div class="list">
            @foreach($colleagues as $colleague)
                <div class="list item">
                    <img src="{{Auth::user()->avatar}}" class="list item image-list image">
                    <p class="list item label">{{$colleague->colleague_name}}</p> 
                    <p class="list item image-list context" style="right:113px;">Score: {{$colleague->colleague_score}}</p>
                    <img src="/storage/cover_image/baseline_clear_black_18dp.png" class="list item icon" alt="delete friend">
                    <hr class="list item divider">
                </div><br><br><br><br>
            @endforeach
        </div>
-->
    @else
        <p>No colleagues found</p>
    @endif
@endsection