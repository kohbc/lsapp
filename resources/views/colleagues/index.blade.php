@extends('layouts.app')

@section('content')
    <a href="/colleagues/create" class="button-contained button-contained label">Add new Colleague</a>
    @if(count($colleagues) > 0)
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
    @else
        <p>No colleagues found</p>
    @endif
@endsection