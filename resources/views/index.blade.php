@extends('layouts/app')

@section('title')
Home
@endsection

@section('content')

@if(!empty($user))
<h2>Welkom {{ $user->firstname }}!</h2>
<img src="/images/icons/icon_location.svg" width="10px" alt="">
<h2>{{$user->city }}</h2>
@endif



@foreach($things as $thing)
<div> 
<h1>{{ $thing->title }}</h1>
@if(!empty($thing->distance))
<p>{{ $thing->distance }} km</p>
@endif
 </div>

@endforeach

@component('components/navbar')
@endcomponent

@endsection