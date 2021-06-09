<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @component('components/header')
    @endcomponent

    <div class="container">

        @yield('content')

    </div>

    <script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-messaging.js"></script>

    <script src="{{ asset('js/firebase.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('extra-scripts')
</body>

</html>
