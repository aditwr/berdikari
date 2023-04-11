@extends('front.layouts.landing-page')

@section('content')
    {{-- Navbar --}}
    @include('front.partials.landing.navbar')
    {{-- Konten --}}
    @include('front.partials.activity.activity')
    {{-- About Section --}}
    {{-- Footer --}}
    @include('front.partials.landing.footer')
@endsection
