<nav class="bar-navigation">
    <div class="container">
        <div class="bar-navigation surface">
            <div class="bar-navigation item">
                <div class="bar-navigation item one">
                    <a class="{{(Route::currentRouteName() === 'resources.index') ? 'bar-navigation enabledicon' : ''}}" href="/resources"><img src="/storage/cover_image/baseline_open_in_new_white_18dp.png" class="bar-navigation disabledicon" alt="resources"></a>
                    @if (Route::currentRouteName() === 'resources.index')
                        <span class="bar-navigation enabledlabel">Resources</span>
                    @endif
                </div>
                <div class="bar-navigation item two">
                    <a class="{{(Route::currentRouteName() === 'account.index') ? 'bar-navigation enabledicon' : ''}}" href="/account"><img src="/storage/cover_image/baseline_account_circle_white_18dp.png" class="bar-navigation disabledicon" alt="account"></a>
                    @if (Route::currentRouteName() === 'account.index')
                            <span class="bar-navigation enabledlabel">Account</span>
                    @endif 
                </div>
                <div class="bar-navigation item three">
                    <a class="{{(Route::currentRouteName() === 'activities.index') ? 'bar-navigation enabledicon' : ''}}" href="/activities"><img src="/storage/cover_image/baseline_videogame_asset_white_18dp.png" class="bar-navigation disabledicon" alt="activities"></a>
                    @if (Route::currentRouteName() === 'activities.index')
                        <span class="bar-navigation enabledlabel">Activities</span>
                    @endif
                </div>
                <div class="bar-navigation item four">
                    <a class="{{(Route::currentRouteName() === 'social.index') ? 'bar-navigation enabledicon2' : ''}}" href="/social"><img src="/storage/cover_image/baseline_supervisor_account_white_18dp.png" class="bar-navigation disabledicon" alt="social"></a>
                    @if (Route::currentRouteName() === 'social.index')
                        <span class="bar-navigation enabledlabel">Social</span>
                    @endif
                </div>
                <div class="bar-navigation item five">
                    <a class="{{(Route::currentRouteName() === 'ranking.index') ? 'bar-navigation enabledicon2' : ''}}" href="/ranking"><img src="/storage/cover_image/baseline_analytics_white_18dp.png" class="bar-navigation disabledicon" alt="ranking"></a> 
                    @if (Route::currentRouteName() === 'ranking.index')
                        <span class="bar-navigation enabledlabel">Ranking</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>