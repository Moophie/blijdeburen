<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('csrftoken')
</head>

<body>
    <div class="header2">
        <a href="{{ url()->previous() }}"><img src="/images/icons/icon_back.svg" width="50px" alt=""></a>
        <h2>Instellingen</h2>
    </div>
    <div class="container">
        <div class="card">
            <div class="setting-item">
                <img src="/images/icons/icon_notifications.svg" width="50px" alt="">
                <h3>Notificaties</h3>
            </div>
            <a href="/logout">
                <div class="setting-item">
                    <img src="/images/icons/icon_logout.svg" width="50px" alt="">
                    <h3>Uitloggen</h3>
                </div>
            </a>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
