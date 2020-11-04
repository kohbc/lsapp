@extends('layouts.app')

@section('content')
@if(Auth::user()->level >= 2)
    <a href="/quizzes/create" class="button-contained button-contained label">Create Quiz</a>
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
                    <td><a href="/quizzes/{{$quiz->id}}/edit">Edit</a></td>
                    <td>
                        {!!Form::open(['action' => ['QuizzesController@destroy', $quiz->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>You have no quiz.</p>
    @endif
@endif
@endsection