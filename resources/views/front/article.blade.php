@extends('front.layouts.landing-page')

@section('content')
    {{-- Navbar --}}
    @include('front.partials.landing.navbar')
    {{-- Konten --}}
    <livewire:front.artikel.index>
        {{-- Footer --}}
        @include('front.partials.landing.footer')
    @endsection
