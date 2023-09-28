@extends('front.layouts.landing-page')

@section('content')
    {{-- Navbar --}}
    @include('front.partials.landing.navbar')
    {{-- Konten --}}
    <livewire:front.kegiatan.index>
        {{-- Footer --}}
        @include('front.partials.landing.footer')
    @endsection
