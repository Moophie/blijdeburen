@extends('layouts/app')

@section('title')
    Profiel
@endsection

@section('content')
    @component('components/navbar')
    @endcomponent

    <div class="cardProfile card">
        <a href="/settings">
            <div id="settingsIcon"><img src="/images/icons/icon_settings.svg" alt=""></div>
        </a>
        <form action="/uploadProfile_img" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image">
            <input type="submit" value="Upload">
        </form>
        <div class="card-img-top">
            @if (Auth::user()->profile_img)
                <img class="rounded-circle profilePic" src="{{ asset('/storage/images/' . Auth::user()->profile_img) }}"
                    alt="User profile picture.">
            @else
                <img class="rounded-circle profilePic" src="/images/person_placeholder.png" alt="User profile picture.">
            @endif
        </div>
        <div class="profileBody">
            <div id="userNameCityCard">
                <h1>{{ $user->firstname }} {{ $user->lastname }}</h1>
                <div class="location-update">
                    <form action="/profile" method="POST" class="location-form">
                        {{ csrf_field() }}
                        <input type="text" name="geolng" class="geolng" value="" hidden>
                        <input type="text" name="geolat" class="geolat" value="" hidden>
                        <input type="image" name="submit" src="/images/icons/icon_refresh.svg" alt="Submit"
                            style="width: 50px;" onclick="getLocation(event)" />
                    </form>
                    <h2 class="location-city">{{ $user->city }}</h2>
                </div>
            </div>
        </div>

        <div class="rating">
            <p>
                @for ($i = round($user->rating); $i > 0; $i--)
                    <i class="fas fa-star"></i>
                @endfor
            </p>
        </div>

        <div class="infoUser">
            <div id="uitgeleend">
                <h3>{{ $uitgeleend }}</h3>
                <p>Uitgeleend</p>
            </div>
            <span id="breakLine"></span>
            <div id="geleend">
                <h3>{{ $geleend }}</h3>
                <p>Geleend</p>
            </div>
        </div>
    </div>

    <div class="flex-container">
        <div class="flex-child spullen active">
            <a href="#">
                <h1>Spullen</h1>
                <div></div>
        </div>

        <div class="flex-child diensten">
            <a href="#">
                <h1>Diensten</h1>
                <div></div>
        </div>
    </div>

@section('extra-scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection

@endsection
