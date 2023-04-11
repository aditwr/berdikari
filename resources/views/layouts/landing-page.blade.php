<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Karangtaruna Berdikari</title>

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vendor/alpine.js') }}"></script>

    @stack('styles')
    @stack('scripts')

</head>

<body class="font-default text-slate-900 scroll-smooth">
    @yield('content')
</body>

</html>
