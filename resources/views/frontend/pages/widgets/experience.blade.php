<section class="experience-area section-padding-top" id="experience-page">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 d-none d-lg-block">
                <figure class="single-image wow fadeInLeft">
                    <img src="{{asset($experience?->image)}}" alt="">
                </figure>
            </div>
            <div class="col-lg-6">
                <div class="experience-text">
                    <h3 class="title wow fadeInUp" data-wow-delay="0.3s">{{$experience?->title}}</h3>
                    <div class="desc wow fadeInUp" data-wow-delay="0.4s">
                        {!!$experience?->description!!}
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <!-- Phone -->
                        <div class="icon-info wow fadeInUp d-flex align-items-center" data-wow-delay="0.3s">
                            <div class="icon me-2">
                                <i class="fas fa-mobile-android-alt"></i>
                            </div>
                            <h6 class="m-0">
                                <a target="_blank"
                                href="https://wa.me/{{$experience?->phone}}?text=Hi%20Taufik%2C%20I%20found%20your%20portfolio%20and%20I%E2%80%99d%20like%20to%20discuss%20an%20opportunity%20to%20hire%20you.%20Please%20connect%20when%20you%E2%80%99re%20available."
                                class="text">
                                    {{$experience?->phone}}
                                </a>
                            </h6>
                        </div>
                        <!-- Email -->
                        <div class="icon-info wow fadeInUp d-flex align-items-center" data-wow-delay="0.4s">
                            <div class="icon me-2">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h6 class="m-0">
                                <a target="_blank"
                                href="mailto:{{$experience?->email}}?subject=Hiring%20Opportunity%20%E2%80%93%20Let%E2%80%99s%20Connect"
                                class="text">
                                    {{$experience?->email}}
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
