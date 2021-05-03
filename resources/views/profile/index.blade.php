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
<h2>Location</h2>
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

@endsection
