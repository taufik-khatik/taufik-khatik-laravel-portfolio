@php
    $seo = seo(Route::currentRouteName());
    $generalSetting = \App\Models\GeneralSetting::first();
@endphp
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- Page Title --}}
    <title>
        @if($seo?->title)
            {{ $seo->title }}
        @else
            Portfolio | @yield('title')
        @endif
    </title>

    {{-- SEO Meta Tags --}}
    <meta name="description" content="{{ @$seo?->description }}">
    <meta name="keywords" content="{{ @$seo?->keywords }}">
    <meta name="author" content="Taufik Khatik">

    {{-- Robots --}}
    <meta name="robots" content="{{ $seo?->robots ?? 'index,follow' }}">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ $seo?->canonical_url ?? url()->current() }}">

    {{-- Open Graph (OG) Tags - Social Sharing (Facebook, LinkedIn) --}}
    @if($seo?->og_enabled)
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $seo?->og_title ?: $seo?->title }}">
        <meta property="og:description" content="{{ $seo?->og_description ?: $seo?->description }}">
        <meta property="og:url" content="{{ url()->current() }}">

        @if(!empty($seo?->og_image))
            <meta property="og:image" content="{{ asset($seo->og_image) }}">
        @endif
    @endif

    {{-- Twitter Card --}}
    @if($seo?->twitter_enabled)
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo?->twitter_title ?: $seo?->title }}">
        <meta name="twitter:description" content="{{ $seo?->twitter_description ?: $seo?->description }}">

        @if(!empty($seo?->twitter_image))
            <meta name="twitter:image" content="{{ asset($seo->twitter_image) }}">
        @endif
    @endif

    {{-- Favicon --}}
    @if(!empty($generalSetting?->favicon))
        <link rel="icon" href="{{ asset($generalSetting->favicon) }}" type="image/png">
    @endif

    {{-- Include CSS Stylesheet --}}
    @include('frontend.layouts.inc.style')
</head>

<body>
    <div class="preloader">
        <img src="{{ asset('frontend/assets/images/preloader.gif') }}" alt="">
    </div>

    {{-- Include Navbar --}}
    @if (Request::is('/'))
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
                            <a class="nav-link active" aria-current="page" href="#home-page">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about-page">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#portfolio-page">Projects <i class="fas fa-angle-down"></i></a>
                            <ul class="sub_menu">
                                <li><a href="/portfolio">All Projects</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#skills-page">Skills</a>
                        </li>
                        @if ($serviceTitle?->is_enabled)
                            <li class="nav-item">
                                <a class="nav-link" href="#service-page">Services</a>
                            </li>
                        @endif
                        @if ($blogTitle?->is_enabled)
                            <li class="nav-item">
                                <a class="nav-link" href="#blog-page">Blogs <i class="fas fa-angle-down"></i></a>
                                <ul class="sub_menu">
                                    <li><a href="{{ route('blog') }}">All Blogs</a></li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="#contact-page">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @else
        @include('frontend.layouts.inc.navbar')
    @endif

    <div class="main_wrapper" data-bs-spy="scroll" data-bs-target="#main_menu_area" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary" tabindex="0">

        @yield('content')

        {{-- Include Footer --}}
        @include('frontend.layouts.inc.footer')
    </div>

    {{-- Include JS script --}}
    @include('frontend.layouts.inc.script')
</body>

</html>
