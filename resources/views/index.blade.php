@extends('layouts/app')

@section('title')
    Home
@endsection

@section('content')

    @if (empty($user))
        <div>
            <h1>Bij Blijde Buren kan je altijd huren!</h1>
            <img src="/images/home_illustration.svg" alt="">
            <form action="GET">
                <label for="search"></label>
                <input type="text" name="search" placeholder="Waar ben je naar op zoek?">

                <label for="location"></label>
                <input type="text" name="location" placeholder="Locatie">

                <label for="distance"></label>
                <input type="text" name="distance" placeholder="0 km">
            </form>

            <p>Om gebruik te maken van onze diensten moet je een account hebben.</p>
        </div>

        <h2>Nieuw in de buurt</h2>
    @elseif(!empty($user))

        <h2>Welkom {{ $user->firstname }}!</h2>
        <img src="/images/icons/icon_location.svg" width="10px" alt="">
        <h2>{{ $user->city }}</h2>
    @endif

    <div>
        @foreach ($things as $thing)
            <div>
                <img src="{{ $thing->images->img_url }}" alt="">
                <h3>{{ $thing->title }}</h3>
                <p>{{ $thing->distance }} km</p>
            </div>
        @endforeach
    </div>

    @component('components/navbar')
    @endcomponent

@endsection
