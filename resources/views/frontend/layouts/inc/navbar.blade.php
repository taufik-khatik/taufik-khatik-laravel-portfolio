<nav class="navbar navbar-expand-lg main_menu" id="main_menu_area">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset($generalSetting?->logo) }}" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('portfolio*') || request()->routeIs('show.portfolio')) ? 'active' : '' }}" href="{{ route('portfolio') }}">Projects</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('blog*') || request()->routeIs('show.blog')) ? 'active' : '' }}" href="{{ route('blog') }}">Blogs</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
