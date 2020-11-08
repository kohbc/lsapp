@extends('layouts.app')
@section('content')
    @if(count($results) > 0)
        <div class="list">
            @foreach($results as $result)
            <div class="list item">
                <a href="/results/{{$result->id}}" class="list item label">{{$result->quiz->title}}</a>
                @if($result->active == 1)
                    <p class="list item image-list image">Quiz Ongoing</p>
                @else
                    <p class="list item image-list image">{{$result->mark}}/{{$result->count_que}}</p>
                @endif
                <p class="list item image-list context" style="text-align:right;padding-top:5px;padding-right:20px;">Answered on {{$result->created_at->format('Y-m-d')}} {{$result->created_at->format('H:i')}}</p>
                <img src="/storage/cover_image/baseline_keyboard_arrow_right_black_18dp.png" class="list item icon" alt="next">
                <hr class="list item divider">
            </div><br><br><br><br>
            @endforeach
    @else
        <p>No result found</p>
    @endif
@endsection