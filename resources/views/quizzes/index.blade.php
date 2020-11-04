@extends('layouts.app')

@section('content')
    @if(count($quizzes) > 0)
        <div class="list">
            @foreach($quizzes as $quiz)
                <div class="list item">
                    <a href="/quizzes/{{$quiz->id}}" class="list item label">{{$quiz->title}}</a>
                    @if(!Auth::guest())
                        <div style="display: none;">
                            {{$ace = $quiz->results->where('user_id', Auth::user()->id)->where('ace', 1)->first()}}
                        </div>
                        @if($ace == null)
                            <p class="list item image-list image">No ace</p>
                        @else
                            <p class="list item image-list image">Yes ace</p>
                        @endif
                    @endif      
                    <p class="list item image-list context">Written by {{$quiz->user->name}}</p>
                    <img src="/storage/cover_image/baseline_keyboard_arrow_right_black_18dp.png" class="list item icon" alt="next">
                    <hr class="list item divider">
                </div><br><br><br><br>
            @endforeach
        </div>
    @else
        <p>No quiz found</p>
    @endif
@endsection