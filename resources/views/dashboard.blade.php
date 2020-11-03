@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-4 col-sm-4">
                        <img src="{{Auth::user()->avatar}}">
                        <h3>Username: {{Auth::user()->name}} E-mail: {{Auth::user()->email}}</h3><br/>
                    </div>
                    @if(Auth::user()->level >= 2)
                            <a href="/quizzes/create" class="button-contained surface"><span class="button-contained label">Create Quiz</span></a>

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection