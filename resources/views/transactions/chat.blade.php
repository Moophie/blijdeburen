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
    <div class="container">
        <div class="header">
            <img src="/images/icons/icon_back.svg" width="50px" alt="">
            <img src="{{ $partner->profile_img }}" alt="" width="50px">
            <h1>{{ $transaction->thing->title }}</h1>
        </div>
        <div>
            @foreach ($transaction->messages as $message)
                <div class="message">
                    <p>{{ $message->send_date }}</p>
                    <p>{{ $message->user->firstname }}</p>
                    <p>{{ $message->content }}</p>
                </div>
            @endforeach

        </div>
    </div>
    <div>
        <form action="" method="POST">
            @csrf
            <img src="/images/icons/icon_camera.svg" width="40px" alt="">
            <img src="/images/icons/icon_images.svg" width="40px" alt="">
            <img src="/images/icons/icon_calendar.svg" width="40px" alt="">
            <div>
                <input type="text" name="content">
                <img src="/images/icons/icon_emoji.svg" width="40px" alt="">
            </div>

            <img src="/images/icons/icon_send.svg" width="40px" alt="">

            <input type="submit" value="Send">
        </form>

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
