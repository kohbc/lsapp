@extends('layouts.app')

@section('content')
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
        <a href="/create_question/{{$quiz->id}}" class="button-contained button-contained label">Create Question</a> &nbsp;
        <a href="/dashboard" class="button-contained button-contained label">Save & Exit</a>
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
                        <td><a href="/questions/{{$question->id}}/edit" class="button-contained button-contained label">Edit</a></td>
                        <td><a href="/question_delete/{{$question->id}}" class="button-delete">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>You have no question.</p>
        @endif
    </div>
@endsection