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
            <img src="{{ $partner->profile_img }}" alt="" width="50px">
            <h1>{{ $transaction->thing->title }}</h1>
        </div>
        <div>
            @foreach ($transaction->messages as $message)
                <div class="message">
                    @if ($message->sender == Auth::user())
                        <p>{{ $message->send_time }}</p>
                    @else
                        <p>{{ $message->sender }}</p>
                    @endif
                    <p>{{ $message->content }}</p>
                </div>
            @endforeach

        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
