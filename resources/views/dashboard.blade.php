@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-4 col-sm-4">
                        <img src="{{Auth::user()->avatar}}">
                        <br><br>
                        <p>Username: {{Auth::user()->name}} <br>E-mail: {{Auth::user()->email}}</p><br/>
                    </div>
                    @if(Auth::user()->level >= 2)
                        <a href="/quizzes/create" class="button-contained button-contained label">Create Quiz</a>
                        <br><br>
                        <h3>Your Quizzes</h3>
                        @if(count($quizzes) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($quizzes as $quiz)
                                    <tr>
                                        <td>{{$quiz->title}}</td>
                                        <td><a href="/quizzes/{{$quiz->id}}/edit" class="button-contained button-contained label">Edit</a></td>
                                        <td><a href="/quiz_delete/{{$quiz->id}}" class="button-contained button-contained label">Delete</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You have no quiz.</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection