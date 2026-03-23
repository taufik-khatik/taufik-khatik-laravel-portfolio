@extends('frontend.layouts.master')
@section('title', 'Home')

@section('content')
<!-- Banner-Area-Start -->
<!-- include header -->
@include('frontend.pages.widgets.hero')
<!-- Banner-Area-End -->

<!-- About-Area-Start -->
@include('frontend.pages.widgets.about')
<!-- About-Area-End -->

<!-- Portfolio-Area-Start -->
@include('frontend.pages.widgets.portfolio')
<!-- Portfolio-Area-End -->

<!-- Skills-Area-Start -->
@include('frontend.pages.widgets.skills')
<!-- Skills-Area-End -->

<!-- Experience-Area-Start -->
@include('frontend.pages.widgets.experience')
<!-- Experience-Area-End -->

<!-- Service-Area-Start -->
@if ($serviceTitle?->is_enabled)
    @include('frontend.pages.widgets.service')
@endif
<!-- Service-Area-End -->

<!-- Testimonial-Area-Start -->
@include('frontend.pages.widgets.testimonial')
<!-- Testimonial-Area-End -->

<!-- Blog-Area-Start -->
@if ($blogTitle?->is_enabled)
    @include('frontend.pages.widgets.blog')
@endif
<!-- Blog-Area-End -->

<!-- Contact-Area-Start -->
@include('frontend.pages.widgets.contact')
<!-- Contact-Area-End -->

@endsection
