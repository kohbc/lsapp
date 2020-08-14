@extends('layouts.app')

@section('content')
    <!-- Quizzes -->
    <div class="jumbotron" id="quizzes" onclick="window.location.href='/quizzes'" style="margin:0; padding:0;">
        <img src="/storage/cover_image/quizzes.jpg" width="150px" height="145px" alt="quizzes" style="padding:0px; border: 1px solid #555">
        <h1 style="float:right; text-align:left; margin-right:75px;">Quizzes<br>
        <p style="font-size:15px; text-align:left; padding-top:10px;">Description</p></h1>
    </div>
@endsection
