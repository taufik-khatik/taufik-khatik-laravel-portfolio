@php
    $footerInfo = \App\Models\FooterInfo::first();
    $footerIcons = \App\Models\FooterSocialLink::all();
    $footerUsefulLinks = \App\Models\FooterUsefulLink::all();
    $footerContact = \App\Models\FooterContactInfo::first();
    $footerHelpLinks = \App\Models\FooterHelpLink::all();

    // Dynamic column count (to auto distribute)
    $sections = 1; // footer info is always present
    if ($footerUsefulLinks->count() > 0) $sections++;
    if ($footerContact) $sections++;
    if ($footerHelpLinks->count() > 0) $sections++;

    // Bootstrap column width calculation
    // Max 4 columns → col-lg-3 each | If 3 → col-lg-4 | If 2 → col-lg-6
    $col = match($sections) {
        1 => 'col-lg-12',
        2 => 'col-lg-6',
        3 => 'col-lg-4',
        default => 'col-lg-3',
    };
@endphp

<footer class="footer-area" id="footer-page">
    <div class="container">
        <div class="row footer-widgets g-4">

            {{-- FOOTER INFO (always shown) --}}
            <div class="col-md-6 {{ $col }} widget">
                <div class="text-box">
                    <figure class="footer-logo">
                        <img src="{{asset($generalSetting?->footer_logo)}}" alt="">
                    </figure>
                    <p>{{$footerInfo?->info}}</p>
                    <ul class="d-flex flex-wrap">
                        @foreach ($footerIcons as $icon)
                            <li><a target="_blank" href="{{$icon?->url}}"><i class="{{$icon?->icon}}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- USEFUL LINKS --}}
            @if ($footerUsefulLinks->count() > 0)
                <div class="col-md-6 {{ $col }} widget">
                    <h3 class="widget-title">Useful Link</h3>
                    <ul class="nav-menu">
                        @foreach ($footerUsefulLinks as $usefulLink)
                            <li><a href="{{$usefulLink?->url}}">{{$usefulLink?->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- CONTACT INFO --}}
            @if ($footerContact)
                <div class="col-md-6 {{ $col }} widget">
                    <h3 class="widget-title">Contact Info</h3>
                    <ul>
                        @if ($footerContact?->address)
                            <li><a target="_blank" href="https://maps.google.com/?q={{$footerContact?->address}}">{{$footerContact?->address}}</a></li>
                        @endif

                        @if ($footerContact?->phone)
                            <li><a target="_blank" href="https://wa.me/{{$footerContact?->phone}}?text=Hi%20Taufik%2C%20I%20found%20your%20portfolio%20and%20I%E2%80%99d%20like%20to%20discuss%20an%20opportunity%20to%20hire%20you.%20Please%20connect%20when%20you%E2%80%99re%20available.">
                                {{$footerContact?->phone}}
                            </a></li>
                        @endif

                        @if ($footerContact?->email)
                            <li><a target="_blank" href="mailto:{{$footerContact?->email}}?subject=Hiring%20Opportunity%20%E2%80%93%20Let%E2%80%99s%20Connect">
                                {{$footerContact?->email}}
                            </a></li>
                        @endif
                    </ul>
                </div>
            @endif

            {{-- HELP LINKS --}}
            @if ($footerHelpLinks->count() > 0)
                <div class="col-md-6 {{ $col }} widget">
                    <h3 class="widget-title">Help</h3>
                    <ul class="nav-menu">
                        @foreach ($footerHelpLinks as $footerHelpLink)
                            <li><a href="{{$footerHelpLink?->url}}">{{$footerHelpLink?->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="copyright">
                        <p>{{$footerInfo?->copy_right}}</p>
                        <p>{{$footerInfo?->powered_by}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
