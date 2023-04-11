@extends('front.layouts.landing-page')

@section('content')
    {{-- Navbar --}}
    @include('front.partials.landing.navbar')
    {{-- Konten --}}
    @include('front.partials.article.article')
    {{-- Footer --}}
    @include('front.partials.landing.footer')
@endsection
