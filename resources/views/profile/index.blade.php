@extends('layouts/app')

@section('title')
    Profiel
@endsection

@section('content')
    UNDER CONSTRUCTION

    @component('components/navbar')
    @endcomponent

    <div class="cardProfile card">
        <div id="settingsIcon"><img src="/images/icons/icon_settings.svg" alt=""></div>
        <div class="card-img-top"><img class="rounded-circle profilePic" src="https://picsum.photos/150" alt="User profile picture."></div>
        <div class="profileBody">
            <div id="userNameCityCard">
                <h1>Name</h1>
                <h2 class="location-city">{{ $user->city }}</h2>
            </div>
            <form action="/profile" method="POST">
                {{ csrf_field() }}
                <input type="text" name="geolng" class="geolng" value="" hidden>
                <input type="text" name="geolat" class="geolat" value="" hidden>
                <input type="submit" value="Update " id="updateBtn">
            </form>
        </div>
        <img src="https://via.placeholder.com/150x20" alt="User star rating.">
        <div class="infoUser">
            <div id="uitgeleend">
                <h3>Getal</h3>
                <p>Uitgeleend</p>
            </div>
            <span id="breakLine"></span>
            <div id="geleend">
                <h3>Getal</h3>
                <p>Geleend</p>
            </div>
        </div>
    </div>

    <div class="flex-container">
    <div class="flex-child spullen active">
        <a href="#"><h1>Spullen</h1>
            <div></div>
    </div>
    
    <div class="flex-child diensten">
        <a href="#"><h1>Diensten</h1>
            <div></div>
    </div>
    </div>

    <div id="logout"><a href="/logout">Logout</a></div>

@section('extra-scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection

@endsection
