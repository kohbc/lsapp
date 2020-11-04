@extends('layouts.app')

@section('content')
    <b>Total &nbsp;&nbsp; Name  &nbsp; &nbsp; <img src="/storage/cover_image/baseline_insert_chart_black_18dp.png" class="leaderboardIcon"></b>
    <hr style="height: 1px;background: rgba(0, 0, 0, 0.12);margin-bottom:10px;margin-top:10px;">
    @if(count($users) > 0)
        <div class="list">
            @foreach($users as $user)
                <div class="list item">
                    @if(($user->score) >= 100)
                        <p>{{$user->score}} &nbsp;&nbsp;&nbsp;&nbsp; {{$user->name}} &nbsp; &nbsp; <img src="/storage/cover_image/baseline_favorite_black_18dp.png" class="leaderboardIcon"></p>
                        <hr style="height: 1px;background: rgba(0, 0, 0, 0.12);margin-bottom:10px;margin-top:10px;margin-left:0;margin-right:0;width:345.2px;">
                    @elseif(($user->score <= 9))
                        <p>{{$user->score}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$user->name}} &nbsp; &nbsp; <img src="/storage/cover_image/baseline_favorite_black_18dp.png" class="leaderboardIcon"></p>
                        <hr style="height: 1px;background: rgba(0, 0, 0, 0.12);margin-bottom:10px;margin-top:10px;margin-left:0;margin-right:0;width:345.2px;"> 
                    @endif
                </div><br><br>
            @endforeach
        </div>
    @else
        <p>No user found</p>
    @endif
@endsection