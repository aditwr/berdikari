@extends('front.layouts.landing-page')

@section('content')
    {{-- Navbar --}}
    @include('front.partials.landing.navbar')
    {{-- Hero Section --}}
    <x-front.landing-page.hero />
    {{-- Activity Section --}}
    @include('front.partials.landing.activity')
    {{-- About Section --}}
    @include('front.partials.landing.about')
    {{-- Gallery Section --}}
    @include('front.partials.landing.gallery')
    {{-- Article Section --}}
    @include('front.partials.landing.article')
    {{-- Contact Section --}}
    @include('front.partials.landing.contact')
    {{-- Footer --}}
    @include('front.partials.landing.footer')
@endsection
