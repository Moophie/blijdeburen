@extends('layouts/app')

@section('title')
    {{ $thing->title }}
@endsection

@section('content')

    <div id="wrapperDetail">
        <div>
            <img src="https://picsum.photos/200" width="" alt="" class="detailPic">
            <div id="detail-body">
                <h1>{{ $thing->title }}</h1>
                <h2>{{ $thing->price }}</h2>

                <div id="detail-description">
                    <h3>Productbeschrijving</h3>
                    <p>{{ $thing->description }}</p>
                </div>

                <div id="detail-condition">
                    <h3>Kenmerken</h3>
                    <p>Conditie:{{ $thing->condition }}</p>
                </div>
                <h3>Locatie</h3>
                {{-- <p>{{ $thing->city }}</p> --}}
                {{-- Google maps integratie? --}}
            </div>
        </div>
        <div>
            <div id="card-detail-user">
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
