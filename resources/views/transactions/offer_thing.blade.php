@extends('layouts/app')

@section('title')
    Gerief aanbieden
@endsection

@section('content')

    <h2>Gerief aanbieden</h2>
    <form action="/offer/gerief" method="POST">
        @csrf
        <label for="offer_image">Voeg foto toe</label>
        <input type="file" name="offer-image">
        <label for="title">Titel</label>
        <input type="text" name="title">
        <select name="category">
            <option value="" disabled selected>Categorie</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="price-toggle">
            <button>Gratis</button>
            <button>Prijs</button>
        </div>
        <label for="price">Prijs</label>
        <input type="number" name="price" step="0.01" placeholder="Per dag">
        <label for="description">Productbeschrijving</label>
        <textarea name="description"></textarea>
        <label for="condition">Staat</label>
        <input type="text" name="condition">
        <input type="submit" value="Plaatsen">
    </form>

    @component('components/navbar')
    @endcomponent

@endsection
