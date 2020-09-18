<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
        .navbar-inverse {
            background-color: #4A148C;
        }

        .navbar-bottom {
            overflow: hidden;
            background-color: #4A148C;
            position: fixed;
            bottom: 0;
            width: 100%;
            margin-bottom: 0;
        }

        .navbar-bottom a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 12.85px;
            width: 74.5px;
            height: 49.5px;
        }

        .navbar-bottom a:hover {
            background: #f1f1f1;
            color: black;
        }

        .navbar-bottom a.active {
            width: 25%;
        }
        
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

    </style>
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
        @include('inc.bottombar')
    </div>

    <!-- Scripts  -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>
</html>