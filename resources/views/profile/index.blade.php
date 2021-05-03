@extends('layouts/app')

@section('title')
    Profiel
@endsection

@section('content')
    UNDER CONSTRUCTION

    @component('components/navbar')
    @endcomponent

    <img src="/images/icons/icon_settings.svg" alt="">

    <img src="https://via.placeholder.com/150" alt="User profile picture.">

    <h1>Name</h1>
    <h2 class="location-city">{{ $user->city }}</h2>
    <form action="/profile" method="POST">
        {{ csrf_field() }}
        <input type="text" name="geolng" class="geolng" value="" hidden>
        <input type="text" name="geolat" class="geolat" value="" hidden>
        <input type="submit" value="Update ">
    </form>
    <img src="https://via.placeholder.com/150x20" alt="User star rating.">
    <img src="/images/icons/icon_edit.svg" alt="">

    <div>
        <h3>Getal</h3>
        <p>Uitgeleend</p>
    </div>

    <div>
        <h3>Getal</h3>
        <p>Geleend</p>
    </div>

    <a href="/logout">Logout</a>

@section('extra-scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection

@endsection
