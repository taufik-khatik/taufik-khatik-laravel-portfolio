<section class="blog-area section-padding-top" id="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{$blogTitle?->title}}</h3>
                    <div class="desc">
                        {{$blogTitle?->sub_title}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-slider">
                    @foreach ($blogs as $blog)

                    <div class="single-blog">
                        <figure class="blog-image">
                            <img src="{{asset($blog?->image)}}" alt="">
                        </figure>
                        <div class="blog-content">
                            <h4 class="title"><a title="{{$blog?->title}}" href="{{route('show.blog', $blog->id)}}">{{$blog?->title}}</a></h4>
                            <div class="desc">
                                <p>{!!Str::limit($blog?->description, 150, '...')!!}</p>
                            </div>
                            <a href="{{route('show.blog', $blog->id)}}" class="button-primary-trans mouse-dir">Read More <span
                                    class="dir-part"></span> <i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 text-center">
                <a href="{{ route('blog') }}" class="load-more mouse-dir">Load More <i class="fal fa-sync"></i><span class="dir-part"></span></a>
            </div>
        </div>
    </div>
</section>
