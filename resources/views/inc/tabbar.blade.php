<nav class="bar-tab">
    <div class="container">
        <div class="bar-tab surface">
            @if (Route::currentRouteName() === 'resources.index')
                <span class="bar-tab disabled label">Race</span>
                <span class="bar-tab disabled label">Gender</span>
                <span class="bar-tab disabled label">Disabled</span>
            @endif
        </div>
    </div>
</nav>