@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Username: {{Auth::user()->name}} E-mail: {{Auth::user()->email}}</h3><br/>
                    @if(Auth::user()->level >= 2)
                        <a href="/quizzes/create" class="btn btn-primary">Create Quiz</a>
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
                            <p>You have no post.</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection