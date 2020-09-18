<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <!-- <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a> -->

            <a href="#" onclick="window.history.go(-1)"><img src="/storage/cover_image/baseline_arrow_back_white_18dp.png" class="left" alt="back" style="width:25px; height:25px; margin:10px;"></a>

            @if (Route::currentRouteName() === 'resources.index')
                <span style="color:white; font-weight:bold; font-family:  Arial, Helvetica, sans-serif; font-size:125%;" class="left">Resources</span>
            @elseif (Route::currentRouteName() === 'account.index')
                <span style="color:white; font-weight:bold; font-family:  Arial, Helvetica, sans-serif; font-size:125%;" class="left">My Account</span>
            @elseif (Route::currentRouteName() === 'activities.index')
                <span style="color:white; font-weight:bold; font-family:  Arial, Helvetica, sans-serif; font-size:125%;" class="left">Activities</span>
            @elseif (Route::currentRouteName() === 'social.index')
                <span style="color:white; font-weight:bold; font-family:  Arial, Helvetica, sans-serif; font-size:125%;" class="left">Colleagues</span>
            @elseif (Route::currentRouteName() === 'ranking.index')
                <span style="color:white; font-weight:bold; font-family:  Arial, Helvetica, sans-serif; font-size:125%;" class="left">Leaderboard</span>
            @endif
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav">
              <li><a href="/">Home</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/services">Services</a></li>
              <!-- <li><a href="/posts">Post</a></li> -->
              <li><a href="/quizzes">Quiz</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                            <!--Donno why class doesn't work properly
                            <ul class="dropdown-menu">
                            -->
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <!--
                            </ul>
                            -->
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>