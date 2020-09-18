<nav class="navbar navbar-bottom">
    <div class="container">
        <div class="navbar-header">
            <a class="{{(Route::currentRouteName() === 'resources.index') ? 'active' : ''}}" href="/resources"><img src="/storage/cover_image/baseline_open_in_new_white_18dp.png" class="center " alt="resources">
                @if (Route::currentRouteName() === 'resources.index')
                    <span>Resources</span>
                @endif
            </a>
            <a class="{{(Route::currentRouteName() === 'account.index') ? 'active' : ''}}" href="/account"><img src="/storage/cover_image/baseline_account_circle_white_18dp.png" class="center" alt="account">
                @if (Route::currentRouteName() === 'account.index')
                    <span>Account</span>
                @endif
            </a>
            <a class="{{(Route::currentRouteName() === 'activities.index') ? 'active' : ''}}" href="/activities"><img src="/storage/cover_image/baseline_videogame_asset_white_18dp.png" class="center" alt="activities">
                @if (Route::currentRouteName() === 'activities.index')
                    <span>Activities</span>
                @endif
            </a>
            <a class="{{(Route::currentRouteName() === 'social.index') ? 'active' : ''}}" href="/social"><img src="/storage/cover_image/baseline_supervisor_account_white_18dp.png" class="center" alt="social">
                @if (Route::currentRouteName() === 'social.index')
                    <span>Social</span>
                @endif
            </a>
            <a class="{{(Route::currentRouteName() === 'ranking.index') ? 'active' : ''}}" href="/ranking"><img src="/storage/cover_image/baseline_analytics_white_18dp.png" class="center" alt="ranking">
                @if (Route::currentRouteName() === 'ranking.index')
                    <span>Ranking</span>
                @endif
            </a>
        </div>
    </div>
</nav>