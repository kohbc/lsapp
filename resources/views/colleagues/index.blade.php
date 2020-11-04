@extends('layouts.app')

@section('content')
    @if(count($colleagues) > 0)
        @foreach($colleagues as $colleague)
            <div class=well>
                <h3>{{$colleague->colleague_name}} ({{$colleague->colleague_score}})</h3> 
            </div>
        @endforeach
    @else
        <p>No colleagues found</p>
    @endif
    <a href="/colleagues/create" class="button-contained button-contained label">Add new Colleague</a>
@endsection