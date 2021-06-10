@extends('layouts/app')

@section('title')
    Home
@endsection

@section('content')
    @php

    $uri_fullpath = $_SERVER['REQUEST_URI'];
    $uri_parts = explode('/', $uri_fullpath);
    $nav_location = $uri_parts[1];
    if (!empty($uri_parts[2])) {
        $nav_location2 = $uri_parts[2];
    } else {
        $nav_location2 = 'Gerief';
    }

    @endphp

    @if (empty($user))
        <div class="card">
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
        <div class="welcomeHeader">
            <div class="welcomeUser">
                <h2>Welkom {{ $user->firstname }}!</h2>
                <div class="userCity">
                    <img src="/images/icons/icon_location.svg" width="10px" alt="">
                    <h3 id="usercity">{{ $user->city }}</h3>
                </div>
                <!--<button onclick="startFCM()" class="btn btn-info">Allow notification</button>-->
            </div>
            <div class="headerNav">
                {{-- <button class="btn active">Gerief</button>
                <button class="btn">Diensten</button>
                <button class="btn">Zoekertjes</button> --}}
                <form action="/switchMode" method="POST">
                    @csrf
                    <div id="btns">
                        <input type="submit" value="Gerief" name="mode" class="btn @if ($nav_location2=='Gerief' ) active @endif">
                        <input type="submit" value="Diensten" name="mode" class="btn @if ($nav_location2=='Diensten' ) active @endif">
                        <input type="submit" value="Zoekertjes" name="mode" class="btn @if ($nav_location2=='Zoekertjes' ) active @endif">
                    </div>
                </form>
            </div>
        </div>

        @if ($mode == 'Gerief' || $mode == 'Diensten')
            <form action="" method="GET">
                <label for="category"></label>
                <select id="category" name="category" onchange="this.form.submit()">
                    <option value="category" disabled selected>Categorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" style="background-image:url(https://picsum.photos/200);">
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($mode == 'Gerief')
                    <a href="/filters/Gerief"><img src="/images/icons/icon_filter.svg" alt="" id="filterIcon"></a>
                @endif
                @if ($mode == 'Diensten')
                    <a href="/filters/Diensten"><img src="/images/icons/icon_filter.svg" alt="" id="filterIcon"></a>
                @endif
            </form>
        @endif
    @endif

    @if ($mode == 'Gerief')
        <div class="cardview">
            @foreach ($things as $thing)
                <div class="card">
                    <a href="/gerief/{{ $thing->id }}">
                        @if (!empty($thing->images()->first()->img_url)))
                            <img src="{{ asset('/storage/images/' . $thing->images()->first()->img_url) }}" alt="">
                        @else
                            <img src="/images/thing_placeholder.png" alt="">
                        @endif
                    </a>
                    <h3>{{ $thing->title }}</h3>
                    @if ($thing->price == 0)
                        <div id="priceCard">
                            <span>Te leen</span>
                        </div>
                    @else
                        <div id="priceCard">
                            <span>&euro; {{ $thing->price }}/dag</span>
                        </div>
                    @endif
                    <div class="card-body">
                        <img src="{{ asset('/storage/images/' . $thing->user->profile_img) }}" alt=""
                            class="profile rounded-circle" width="30px">
                        <div>
                            <h4>{{ $thing->user->firstname }} {{ $thing->user->lastname }}</h4>
                            <p>{{ $thing->user->city }} &bull; {{ $thing['distance'] }} km</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @elseif($mode == "Diensten")
            @foreach ($services as $service)
                <div class="card">
                    <h3>{{ $service->title }}</h3>
                    @if ($service->price == 0)
                        <div id="price">
                            <span>Te leen</span>
                        </div>
                    @else
                        <div id="price">
                            <span>&euro; {{ $service->price }}/dag</span>
                        </div>
                    @endif
                    <div class="card-body">
                        <img src="{{ asset('/storage/images/' . $service->user->profile_img) }}" alt=""
                            class="profile rounded-circle" width="30px">
                        <div>
                            <h4>{{ $service->user->firstname }} {{ $service->user->lastname }}</h4>
                            <p>{{ $service->user->city }} &bull; {{ $service['distance'] }} km</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @elseif($mode == "Zoekertjes")
            @foreach ($adverts as $advert)
                <div class="card zoekertje">
                    <h3>{{ $advert->title }}</h3>
                    <p>{{ $advert->description }}</p>

                    <div class="card-body">
                        <img src="{{ asset('/storage/images/' . $advert->user->profile_img) }}" alt=""
                            class="profile rounded-circle" width="30px">
                        <h4>{{ $advert->user->firstname }} {{ $advert->user->lastname }}</h4>
                        <p>{{ $advert->user->city }} &bull; {{ $advert['distance'] }} km</p>
                        <form action="/contacteer" method="POST">
                            @csrf
                            <input type="text" name="thing_id" value="1" hidden> {{-- PLACEHOLDER PLEASE CHANGE --}}
                            <input type="text" name="user1_id" value="{{ Auth::id() }}" hidden>
                            <input type="text" name="user2_id" value="{{ $advert->user->id }}" hidden>
                            <input type="submit" value="Dit heb ik!" class="btn">
                        </form>
                    </div>
                </div>
            @endforeach
    @endif
    <span id="loadMore"><a href="#">Laad meer...</a></span>
    </div>

    @component('components/navbar')
    @endcomponent

@endsection
