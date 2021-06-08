@extends('layouts/app')

@section('title')
    {{ $thing->title }}
@endsection

@section('content')

    <div>
        <div>
            <h1>{{ $thing->title }}</h1>
            <h2>{{ $thing->price }}</h2>
            <h3>Productbeschrijving</h3>
            <p>{{ $thing->description }}</p>
            <h3>Kenmerken</h3>
            <p>Conditie:{{ $thing->condition }}</p>
            <h3>Locatie</h3>
            {{-- <p>{{ $thing->city }}</p> --}}
            {{-- Google maps integratie? --}}
        </div>
        <div>
            <div>
                <img src="{{ $thing->user->profile_img }}" alt="">
                <h3>{{ $thing->user->firstname }} {{ $thing->user->lastname }}></h3>
                <p>{{ $thing->user->city }} &bull; {{ $thing['distance'] }} km</p>
            </div>
            <form action="/contacteer" method="POST">
                @csrf
                <input type="text" name="thing_id" value="{{$thing->id}}" hidden>
                <input type="text" name="user1_id" value="{{$thing->user->id}}" hidden>
                <input type="text" name="user2_id" value="{{ Auth::id() }}" hidden>
                <input type="submit" value="Contacteer">
            </form>
        </div>
    </div>


    @component('components/navbar')
    @endcomponent

@endsection
