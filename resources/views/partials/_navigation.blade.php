<nav class="navbar navbar-expand navigation-bar">
<a class="navbar-brand navigation-links" href="/">SMUIA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            
            @if (Auth::check())
            <li class="nav-item {{Request::is('/') ? "active" : ""}}">
                <a class="nav-link navigation-links" href="{{route('question.index')}}">Questions<span class="sr-only">(current)</span></a>
            <li class="nav-item {{Request::is('/') ? "active" : ""}}">
                <a class="nav-link navigation-links" href="#">Files<span class="sr-only">(current)</span></a>
            </li>
            @endif

            @if (Auth::guest())
            <li class="nav-item {{Request::is('about') ? "active" : ""}}">
                <a class="nav-link navigation-links" href="/about">About</a>
            </li>
            <li class="nav-item {{Request::is('contact') ? "active" : ""}}">
                <a class="nav-link navigation-links" href="/contact">Contact</a>
            </li>
            @endif
        </ul>
        <ul class="navbar-nav navbar-right ml-auto">
            
            @if (Auth::check())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navigation-links navbar-right capitalize" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}} {{Auth::user()->surname}}
                </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="my-account nav-link" href="{{route('categories.index')}}">Categories</a>
                <hr class="create-hr create-hr-pages">
                <a class="my-account nav-link" href="{{route('logout')}}">Log out</a>
            </div>
            </li>
            @else
              <a href="{{route('register')}}" class="navigation-links navbar-right register-link">Register</a>
              <a href="{{route('login')}}" class="navigation-links navbar-right">Login</a>
            @endif
        </ul>
    </div>
</nav>