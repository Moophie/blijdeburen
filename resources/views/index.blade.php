@extends('layouts/app')

@section('title')
Home
@endsection

@section('content')
@foreach($things as $thing)
<div> 
<h1>{{ $thing->title }}</h1>
<p>{{ $thing->distance }} km</p>
 </div>

@endforeach

@component('components/navbar')
@endcomponent

@endsection