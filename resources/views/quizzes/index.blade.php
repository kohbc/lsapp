@extends('layouts.app')

@section('content')
    <!-- <h1>Available Quizzes</h1> -->
    @if(count($quizzes) > 0)
        @foreach($quizzes as $quiz)
            <div class=well>
                <h3><a href="/quizzes/{{$quiz->id}}">{{$quiz->title}}</a></h3> 
                @if(!Auth::guest())
                    <div style="display: none;">
                        {{$ace = $quiz->results->where('user_id', Auth::user()->id)->where('ace', 1)->first()}}
                    </div>
                    @if($ace == null)
                        <p>No ace</p>
                    @else
                        <p>Yes ace</p>
                    @endif
                @endif               
                <small>Written on {{$quiz->created_at}} by {{$quiz->user->name}}</small>
            </div>
        @endforeach
        <!-- Pagination buttons -->
        {{$quizzes->links()}}
    @else
        <p>No quiz found</p>
    @endif
@endsection