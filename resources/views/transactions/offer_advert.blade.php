@extends('layouts/app')

@section('title')
    Zoekertje plaatsen
@endsection

@section('content')
    <div class="parent">
        <h2>Zoekertje plaatsen</h2>
        <form action="/offer/zoekertje" method="POST" class="form-zoekertje">
            @csrf
            <div id="offerTitle">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div id="serviceDetail">
                <label for="description" class="form-label">Beschrijving</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <input type="submit" value="Plaatsen" class="btn btn-primary">
        </form>
    </div>

    @component('components/navbar')
    @endcomponent

@endsection
