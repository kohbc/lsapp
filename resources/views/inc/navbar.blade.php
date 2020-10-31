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
                            <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                Logout
                            </a></li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</nav>