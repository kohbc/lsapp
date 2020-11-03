@extends('layouts.app')

@section('content')
    <a href="/dashboard" class="btn btn-default">Go Back</a>
    <h1>Edit Quiz</h1>
    {!! Form::open(['action' => ['QuizzesController@update', $quiz->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $quiz->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $quiz->description, ['class' => 'foo', 'placeholder' => 'Description', 'rows' => 10, 'cols' => 44.75])}}
            {{Form::label('type', 'Quiz Type')}}
            {{Form::text('type', $quiz->type, ['class' => 'form-control', 'placeholder' => 'Quiz Type'])}}
            {{Form::label('youtube', 'YouTube')}}
            {{Form::text('youtube', $quiz->youtube, ['class' => 'form-control', 'placeholder' => 'YouTube'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    <br/>
    <div class="panel-body">
        <a href="/create_question/{{$quiz->id}}" class="btn btn-primary">Create Question</a>
        <h3>Your Questions</h3>
        @if(count($questions) > 0)
            <table class="table table-striped">
                <tr>
                    <th>Title</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($questions as $question)
                    <tr>
                        <td>{{$question->title}}</td>
                        <td><a href="/questions/{{$question->id}}/edit" class="btn btn-default">Edit</a></td>
                        <td><a href="/question_delete/{{$question->id}}" class="btn btn-default">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>You have no question.</p>
        @endif
    </div>
@endsection