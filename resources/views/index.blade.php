@extends('layouts/app')

@section('title')
    Home
@endsection

@section('content')

    @if (empty($user))
        <div>
            <h1>Bij Blijde Buren kan je altijd huren!</h1>
            <img src="/images/home_illustration.svg" alt="">
            <form action="" method="GET">
                @csrf
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

        <div>
            <button>Gerief</button>
            <button>Diensten</button>
            <button>Zoekertjes</button>
        </div>

        <form action="" method="GET">
            @csrf
            <label for="category"></label>
            <select name="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <img src="https://picsum.photos/50" alt="">
        </form>
    @endif

    <div>
        @foreach ($things as $thing)
            <div>
                {{-- <img src="{{ $thing->images->img_url }}" alt=""> --}}
                <img src="https://picsum.photos/200" alt="">
                <h3>{{ $thing->title }}</h3>
                @if ($thing->price == 0)
                    <p>Te leen</p>
                @else
                    <p>&euro; {{ $thing->price }}/dag</p>
                @endif
                <div>
                    {{-- <img src="{{$thing->user->profile_img}}" alt=""> --}}
                    <img src="https://picsum.photos/50" alt="">
                    <div>
                        <h4>{{ $thing->user->firstname }} {{ $thing->user->lastname }}</h4>
                        <p>{{ $thing->user->city }} &bull; {{ $thing['distance'] }} km</p>
                    </div>
                </div>
            </div>
        @endforeach

        <a href="#">Laad meer...</a>
    </div>

    @component('components/navbar')
    @endcomponent

@endsection
