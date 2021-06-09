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
        <div class="welcomeHeader">
            <div class="welcomeUser">
                <h2>Welkom {{ $user->firstname }}!</h2>
                <div class="userCity">
                    <img src="/images/icons/icon_location.svg" width="10px" alt="">
                    <h3 id="usercity">{{ $user->city }}</h3>
                </div>
            </div>
            <div class="headerNav">
                {{-- <button class="btn active">Gerief</button>
                <button class="btn">Diensten</button>
                <button class="btn">Zoekertjes</button> --}}
                <form action="" method="POST">
                    @csrf
                    <input type="submit" value="Gerief" name="mode" class="btn">
                    <input type="submit" value="Diensten" name="mode" class="btn">
                    <input type="submit" value="Zoekertjes" name="mode" class="btn">
                </form>
            </div>
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

    @if ($mode == 'Gerief')
        <div class="cardview">
            @foreach ($things as $thing)
                <div class="card">
                    {{-- <img src="{{ $thing->images->img_url }}" class="card-img-top" alt=""> --}}
                    <a href="/gerief/{{ $thing->id }}"><img src="https://picsum.photos/200" alt=""></a>
                    <h3>{{ $thing->title }}</h3>
                    @if ($thing->price == 0)
                        <div id="price">
                            <span>Te leen</span>
                        </div>
                    @else
                        <div id="price">
                            <span>&euro; {{ $thing->price }}/dag</span>
                        </div>
                    @endif
                    <div class="card-body">
                        {{-- <img src="{{$thing->user->profile_img}}" alt=""> --}}
                        <img src="https://picsum.photos/50" alt="" class="profile rounded-circle">
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
                    {{-- <img src="{{ $thing->images->img_url }}" class="card-img-top" alt=""> --}}
                    <a href="/dienst/{{ $service->id }}"><img src="https://picsum.photos/200" alt=""></a>
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
                        {{-- <img src="{{$thing->user->profile_img}}" alt=""> --}}
                        <img src="https://picsum.photos/50" alt="" class="profile rounded-circle">
                        <div>
                            <h4>{{ $service->user->firstname }} {{ $service->user->lastname }}</h4>
                            <p>{{ $service->user->city }} &bull; {{ $service['distance'] }} km</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @elseif($mode == "Zoekertjes")
            @foreach ($adverts as $advert)
                <div class="card">
                    <h3>{{ $advert->title }}</h3>
                    <p>{{ $advert->description }}</p>

                    <div class="card-body">
                        <div>
                            {{-- <img src="{{$thing->user->profile_img}}" alt=""> --}}
                            <img src="https://picsum.photos/50" alt="" class="profile rounded-circle">

                            <h4>{{ $advert->user->firstname }} {{ $advert->user->lastname }}</h4>
                            <p>{{ $advert->user->city }} &bull; {{ $advert['distance'] }} km</p>
                            <form action="/contacteer" method="POST">
                                @csrf
                                <input type="text" name="thing_id" value="1" hidden> {{-- PLACEHOLDER PLEASE CHANGE --}}
                                <input type="text" name="user1_id" value="{{Auth::id()}}" hidden>
                                <input type="text" name="user2_id" value="{{$advert->user->id }}" hidden>
                                <input type="submit" value="Dit heb ik!">
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
    @endif
    <span id="loadMore"><a href="#">Laad meer...</a></span>
    </div>

    @component('components/navbar')
    @endcomponent

@endsection
