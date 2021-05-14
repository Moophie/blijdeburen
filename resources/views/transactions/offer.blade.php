@extends('layouts/app')

@section('title')
Offer
@endsection

@section('content')
<h3>Kies in welke categorie je wil plaatsen</h3>
<ul>
    <li><a href="/offer/gerief">Gerief</a></li>
    <li><a href="/offer/dienst">Diensten</a></li>
    <li><a href="/offer/zoekertje">Zoekertjes</a></li>
</ul>

@component('components/navbar')
@endcomponent

@endsection