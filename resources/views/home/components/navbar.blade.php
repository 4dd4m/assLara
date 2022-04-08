<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow fixed">
    <a class="navbar-brand" href="/">
        <?php echo Auth::check() == 1 ? "admin@" : "user@";?>
        @yield('title')</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
        data-target="#navbarsExample05" aria-controls="navbarsExample05" 
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav mr-auto">
            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
