@extends('layouts/app')

@section('title')
Home
@endsection

@section('content')

<h2>Welkom {{ $user->firstname }}!</h2>
<img src="/images/icons/icon_location.svg" width="10px" alt="">
<h2>{{$user->city }}</h2>



@foreach($things as $thing)
<div> 
<h1>{{ $thing->title }}</h1>
<p>{{ $thing->distance }} km</p>
 </div>

@endforeach

@component('components/navbar')
@endcomponent

@endsection