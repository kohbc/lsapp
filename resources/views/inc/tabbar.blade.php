<nav class="bar-tab">
    <div class="container">
        <div class="bar-tab surface">
            @if (Route::currentRouteName() === 'resources.index')
                <div class="bar-tab item1">
                    <span class="bar-tab disabled label">Race</span>
                </div>
                <div class="bar-tab item2">
                    <span class="bar-tab disabled label">Gender</span>
                </div>
                <div class="bar-tab item3">
                    <span class="bar-tab disabled label">Disabled</span>
                </div>
            @elseif (Route::currentRouteName() === 'dashboard.index')
                <div class="bar-tab item4">
                    <span class="bar-tab disabled label">Progress</span>
                </div>
                <div class="bar-tab item5">
                    <span class="bar-tab disabled label">Settings</span>
                </div>
            @elseif (Route::currentRouteName() === 'activities.index')
                <div class="bar-tab item4">
                    <span class="bar-tab disabled label">New</span>
                </div>
                <div class="bar-tab item5">
                    <span class="bar-tab disabled label">Completed</span>
                </div>
            @elseif (Route::currentRouteName() === 'ranking.index')
                <div class="bar-tab item1">
                    <span class="bar-tab disabled label">Achievements</span>
                </div>
                <div class="bar-tab item2">
                    <span class="bar-tab disabled label">Score</span>
                </div>
                <div class="bar-tab item3">
                    <span class="bar-tab disabled label">Completed</span>
                </div>
            @endif
        </div>
    </div>
</nav>