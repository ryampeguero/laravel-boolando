<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @Vite('resources/js/app.js')
</head>

<body>
    {{-- HEADER --}}
    @include('partials.header')
    {{-- HEADER --}}

    {{-- MAIN --}}
    @yield('content')
    {{-- MAIN --}}

    {{-- FOOTER --}}
    @include('partials.footer')
    {{-- FOOTER --}}
</body>

</html>
