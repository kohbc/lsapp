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
        {{Form::submit('Save', ['class' => 'button-contained button-contained label'])}}
    {!! Form::close() !!}
    <br/>
    <div class="panel-body">
        <button-contained href="/create_question/{{$quiz->id}}" class="button-contained button-contained label">Create Question</button-contained>            
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
                        <td><button-contained href="/questions/{{$question->id}}/edit" class="button-contained button-contained label">Edit</button-contained></td>
                        <td><button-contained href=href="/question_delete/{{$question->id}}" class="button-contained button-contained label">Delete</button-contained></td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>You have no question.</p>
        @endif
    </div>
@endsection