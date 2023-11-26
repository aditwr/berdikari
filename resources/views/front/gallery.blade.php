@extends('front.layouts.landing-page')

@section('content')
    {{-- Navbar --}}
    @include('front.partials.landing.navbar')
    {{-- Konten --}}
    <livewire:front.galeri.galeri>
        {{-- Footer --}}
        @include('front.partials.landing.footer')
    @endsection
