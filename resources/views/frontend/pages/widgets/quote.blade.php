@if ($quote?->is_enabled)
    <section class="quote-area section-padding-bottom" id="quote-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="quote-box" {!! $quote?->image ? 'style="background: url('.asset($quote->image).') no-repeat scroll top center/cover"' : '' !!}>
                        <div class="row ">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="quote-content">
                                    <h4 class="title">{{ $quote?->title }}</h4>
                                    <div class="desc">
                                        <p>{!! $quote?->sub_title !!}</p>
                                    </div>
                                    <a href="{{ $quote?->btn_url }}" class="button-orange mouse-dir">
                                        {{ $quote?->btn_text }} <span class="dir-part"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
