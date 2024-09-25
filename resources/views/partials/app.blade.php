<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') | {{ config('app.name')}}</title>

    @vite('resources/sass/app.scss')
</head>

<body>
    @include('partials.nav')
    <div class="wrapper">

        {{-- Page content goes here --}}

        @yield('content')
    </div>
    @vite('resources/ts/app.ts')
</body>

</html>
