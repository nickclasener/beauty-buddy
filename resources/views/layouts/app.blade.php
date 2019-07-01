<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts._head')

<body class="bg-gray-200 font-sans text-base-font text-gray-700">
@include('layouts._navbar2')

@yield('main')
</body>
</html>
