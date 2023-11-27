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
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/logo/png/berdikari-favicon-color.png') }}" type="image/x-icon">

    @stack('styles')
    @stack('scripts')
    {{-- Livewire Style & Js --}}
    @livewireStyles
</head>

<body class="font-normal font-default text-slate-900 scroll-smooth bg-gray-50">

    <x-dashboard.navigation></x-dashboard.navigation>

    <!--Main layout-->
    <main style="">
        <div class="pt-[84px] xl:pl-[264px] 2xl:pl-72  pb-12">
            {{-- Content --}}
            @yield('content')
        </div>
    </main>


    {{-- Scripts --}}
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vendor/alpine.js') }}"></script>
    @stack('script_after')
</body>

</html>
