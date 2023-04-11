@extends('front.layouts.landing-page')

@section('content')
    {{-- Navbar --}}
    @include('front.partials.landing.navbar')
    {{-- Hero Section --}}
    @include('front.partials.landing.hero')
    {{-- Activity Section --}}
    @include('front.partials.landing.activity')
    {{-- About Section --}}
    @include('front.partials.landing.about')
    {{-- Gallery Section --}}
    @include('front.partials.landing.gallery')
    {{-- Article Section --}}
    @include('front.partials.landing.article')
    {{-- Footer --}}
    @include('front.partials.landing.footer')
@endsection
