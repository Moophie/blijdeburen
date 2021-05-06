<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('csrftoken')
</head>

<body>
    @component('components/header')
    @endcomponent

    <div class="container">
        
        @yield('content')

    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>