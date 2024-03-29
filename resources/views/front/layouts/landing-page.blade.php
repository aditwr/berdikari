<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Karangtaruna Berdikari</title>

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/logo/png/berdikari-favicon-color.png') }}" type="image/x-icon">

    @stack('styles')
    @stack('scripts')
    @livewireStyles()
</head>

<body class="font-default text-slate-900 ">
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vendor/alpine.js') }}"></script>
    @livewireScripts()
    @stack('script_front_body')
</body>

</html>
