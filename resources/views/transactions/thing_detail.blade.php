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
                <img src="{{$thing->user->profile_img}}" alt="">
                <h3>{{$thing->user->firstname}} {{$thing->user->lastname}}></h3>
                <p>{{ $thing->user->city }} &bull; {{ $thing['distance'] }} km</p>
            </div>
            <a href="/chat">Contacteer</a>
        </div>
    </div>


    @component('components/navbar')
    @endcomponent

@endsection
