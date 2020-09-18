<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1">

        <title>{{config('app.name', 'TEA')}}</title>

    </head>
    <body>
    
    <div id="body-frame" style="width:1000px; position: absolute; z-index: 15; left: 50%; margin-left: -500px; border:2px solid black;">

        <div id="top-box" align="center" style="height:30px; border-bottom:1px solid black; padding-top:10px;">
            <label for="logo">LOGO</label>
            <input type="text" name="searchFunction" id="searchFunction" placeholder=" Search" />
            <button type="button" name="searchButton" id="searchButton"  style="margin-right:20px;">Login</button>
            <a href="home" style="margin-right:20px;">Home</a>
            <label style="margin-right:20px;">|</label>
            <a href="about" style="margin-right:20px;">About</a>
            <label style="margin-right:20px;">|</label>
            <a href="login"style="margin-right:20px;">Login</a>
            <label style="margin-right:20px;">|</label>
            <a href="signup" style="margin-right:20px;">Sign up</a>
        </div>
       
    </div>


    </body>
</html>
