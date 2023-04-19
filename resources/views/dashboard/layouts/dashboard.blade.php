<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @hasSection('title')
            @yield('title')
        @else
            Karangtaruna Berdikari
        @endif
    </title>

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('styles')
    @stack('scripts')

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vendor/alpine.js') }}"></script>

    {{-- Livewire Style & Js --}}
    @livewireStyles
</head>

<body class="font-normal font-default text-slate-900 scroll-smooth">
    {{-- Sidebar --}}
    <x-dashboard.side-nav />

    <div class="xl:pl-64">
        {{-- Navbar --}}
        @include('dashboard.partials.navbar')


    </div>
    <div class="pt-[84px] xl:pl-[264px] 2xl:pl-72 bg-gray-50 pb-12">
        {{-- Content --}}
        @yield('content')
    </div>

    @livewireScripts
    {{-- <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script> --}}
</body>

</html>
