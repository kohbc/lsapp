<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1">

        <title>{{config('app.name', 'LSAPP')}}</title>

    </head>
    <body>
    
    <div id="body-frame" style="width:1000px; position: absolute; z-index: 15; left: 50%; margin-left: -500px; border:2px solid black;">

        <!--top bar
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
        -->
        
        <!-- Slideshow-->
        <div class="slides_container">
            <div class="mySlides" align="center">
                <img src="/lsapp/resources/views/pages/pic1.png" style="max-width: 100%; max-height: 100%;">
                <div>
                    <p>PICTURE NO 1</p>
                </div>
            </div>
            <div class="mySlides"  align="center">
                <img src="/lsapp/resources/views/pages/pic2.png" style="max-width: 100%; max-height: 100%;">
                <div>
                    <p>PICTURE NO 2</p>
                </div>
            </div>
            <div class="mySlides"  align="center">
                <img src="/lsapp/resources/views/pages/pic3.png" style="max-width: 100%; max-height: 100%;">
                <div>
                    <p>PICTURE NO 3</p>
                </div>
            </div>
            
        </div>
        <!--box-->
        <div id="box" style="text-align:center;border-bottom:1px solid black;">
            <div style="height:50px; width:50px; display:inline-block;" onclick="plusDivs(-1)">
                <p><b><</b></p>
            </div>
                <div class="multibox" onclick="currentDiv(1)" style="height:15px; width:15px; display:inline-block; border:1px solid black;"></div>
                <div class="multibox" onclick="currentDiv(2)" style="height:15px; width:15px; display:inline-block; border:1px solid black;"></div>
                <div class="multibox" onclick="currentDiv(3)" style="height:15px; width:15px; display:inline-block; border:1px solid black;"></div>
             <div style="height:50px; width:50px; display:inline-block;" onclick="plusDivs(1)">
                <p>></p>
            </div>
        </div>

        <div id="corevalue" align="center" style="border-bottom:1px solid black;">
            <h1>Core Values</h1>
        </div>

        <div id="fourpicture" align="center" style="display: flex;  border-bottom:1px solid black;">
            <div style="width:250px; height:100px; border-right:1px solid black;"><p>Good Services</p></div>
            <div style="width:250px; height:100px; border-right:1px solid black;"><p>Speedy</p></div>
            <div style="width:250px; height:100px; border-right:1px solid black;"><p>Less Cost</p></div>
            <div style="width:250px; height:100px;"><p>High Rating</p></div>
        </div>
        <div id="slideshow2"  align="center" style="height:150px; border-bottom:1px solid black;">
        <h1>slideshow no2 need fixing</h1>
        </div>
        <div id="links" style="display: flex; border-bottom:1px solid black;">
            <div id="bottom_about" style="width:300px; height:150px; border-right:1px solid black; padding: 0px 10px 5px 10px;">
                <h2 style="margin:5px 0px -10px 0px;">ABOUT</h2>
                <p>This paragraph means nothing and is only used as a placeholder.</p>
            </div>
            <div id="bottom_menu" style="width:350px; height:150px; padding: 0px 10px 5px 10px;">
                <h2 style="margin:5px 0px 5px 0px;">MENU</h2>
                <a href="about">About</a><br/>
                <a href="contact">Contact</a><br/>
                <a href="faq">FAQ</a><br/>
                <a href="login">Login</a><br/>
                <a href="signup">Sign Up</a><br/>
            </div>
            <div id="bottom_subcribe" style="width:350px; height:150px; padding: 0px 10px 5px 10px;">
                <h2 style="margin:5px 0px -10px 0px;">Subscribe Newsletter</h2><br/>
                <input type="text" name="searchFunction" id="searchFunction" placeholder=" Search" />
                <button type="button" name="searchButton" id="searchButton"  style="margin-right:20px;">SEND</button><br/><br/>
                <h4 style="margin:5px 0px -10px 0px;">Follow us on</h4>
                <p> o o o</p>
                
            </div>
        </div>
        <div id="copyright"  align="center">
        <p>COPYRIGHT @ ALL RIGHTS RESERVED BY HOLIDAZZLE</p>
        </div>
    </div>

    <script>
        // Slideshow
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
        showDivs(slideIndex += n);
        }

        function currentDiv(n) {
        showDivs(slideIndex = n);
        }

        function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("multibox");
        //loop back or forth
        if (n > x.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = x.length} ;
       //hide all pictures
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        //black all box
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
            //dots[i].style.background = white;
        }
        //show specific picture
        x[slideIndex-1].style.display = "block"; 
        //white specific box
        dots[slideIndex-1].className += " w3-white";
        //dots[i].style.background = white;
        }
    </script>

    </body>
</html>
