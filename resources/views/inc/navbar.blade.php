<nav class="bar-app">
    <div class="container">
        <div class="bar-app surface">

            <!-- Branding Image -->
            <!-- <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a> -->

            <div class="bar-app icon">
                <a href="#" onclick="window.history.go(-1)"><img src="/storage/cover_image/baseline_arrow_back_white_18dp.png" class="bar-app icon back" alt="back"></a>

                @if (Route::currentRouteName() === 'resources.index')
                    <span class="bar-app title" style="width:120px;">Resources</span>
                @elseif (Route::currentRouteName() === 'dashboard.index')
                    <span class="bar-app title" style="width:120px;">My Account</span>
                @elseif (Route::currentRouteName() === 'activities.index')
                    <span class="bar-app title" style="width:120px;">Activities</span>
                @elseif (Route::currentRouteName() === 'social.index')
                    <span class="bar-app title" style="width:120px;">Colleagues</span>
                @elseif (Route::currentRouteName() === 'ranking.index')
                    <span class="bar-app title" style="width:120px;">Leaderboard</span>
                @elseif (Route::currentRouteName() === 'quizzes.index')
                    <span class="bar-app title" style="width:120px;">Quizzes</span>
                @elseif (Route::currentRouteName() === 'quizzes.show')
                    <span class="bar-app title" style="width:120px;">{{$quiz->title}}</span>
                @endif

                <img src="/storage/cover_image/baseline_search_white_18dp.png" class="bar-app icon search" alt="search">
                <div>
                    <img src="/storage/cover_image/baseline_more_vert_white_18dp.png" class="bar-app icon overflow" alt="overflow" data-toggle="dropdown"/>
                        <ul class="dropdown-menu pull-right">
                            <span>&nbsp;&nbsp; More: </span>
                            <li><a href="/">TEA Preferences</a></li>
                            <li><a href="/">Contact Staff</a></li>
                            <li><a href="/">About TEA</a></li>
                        </ul>
                </div>
            </div>
            <!-- <div class="bar-app icon">
                <img src="/storage/cover_image/baseline_search_white_18dp.png" class="bar-app icon search" alt="search">
            </div> -->

            <!-- Collapsed Hamburger -->
            <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> -->

            <!-- <div class="collapse navbar-collapse" id="app-navbar-collapse"> -->
                <!-- Left Side Of Navbar -->
                <!-- <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/services">Services</a></li> -->
                <!--<li><a href="/posts">Post</a></li>-->
                <!-- <li><a href="/quizzes">Quiz</a></li>
                @if (!Auth::guest())
                    <li><a href="/answers">Answer</a></li>
                @endif

                </ul>
                 -->
                <!-- Right Side Of Navbar -->
                <!-- <ul class="nav navbar-nav navbar-right"> -->
                    <!-- Authentication Links -->
                    <!-- @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li> -->
                        <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                    <!-- @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                                <ul class="dropdown-menu">
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
                                </ul>
                        </li>
                    @endif
                </ul>
            </div> -->
        </div>
    </div>
</nav>