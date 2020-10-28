@extends('layouts.app')

@section('content')
    <h1>Leaderboard</h1>
    @if(count($users) > 0)
        @foreach($users as $user)
            <div class=well>
                <h3>Username: {{$user->name}} (Score: {{$user->score}})</h3>
            </div>
        @endforeach
    @else
        <p>No user found</p>
    @endif
@endsection