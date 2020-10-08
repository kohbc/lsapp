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
    <link href="{{ asset('css/ui.css') }}" rel="stylesheet">

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
            width: 20%;
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

        .foo {
            display: block;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.6;
            color: #555555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccd0d2;
            border-radius: 4px;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            margin: 0;
        }
        
        .foo::-moz-placeholder {
            color: #b1b7ba;
            opacity: 1;
        }
        
        .foo:-ms-input-placeholder {
            color: #b1b7ba;
        }

        .foo::-webkit-input-placeholder {
            color: #b1b7ba;
        }

        .myRadio{
            float: left;
        }

        .foo2 {
            display: block;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.6;
            color: #555555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccd0d2;
            border-radius: 4px;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            margin-left: 30px;
        }
        
        .foo2::-moz-placeholder {
            color: #b1b7ba;
            opacity: 1;
        }
        
        .foo2:-ms-input-placeholder {
            color: #b1b7ba;
        }

        .foo2::-webkit-input-placeholder {
            color: #b1b7ba;
        }

        .bar-navigation.surface {
            /* Surface */
            position: absolute;
            width: 100%;
            height: 64px;
            left: 0px;
            bottom: 0px;

            /* 1 / Primary — 600* */
            background: #4A148C;

            /* 8dp — Elevation */
            box-shadow: 0px 8px 10px rgba(0, 0, 0, 0.14), 0px 3px 14px rgba(0, 0, 0, 0.12), 0px 4px 5px rgba(0, 0, 0, 0.2);
        }

        .bar-navigation.disabled.icon {
            /* Icon / Circle / Fill */
            position: absolute;
            width: 24px;
            height: 24px;
            left: calc(50% - 24px/2);
            top: calc(50% - 24px/2);

            /* All / White — Disabled */
            background: rgba(255, 255, 255, 0.5);
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