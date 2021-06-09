@extends('layouts/app')

@section('title')
    Gerief aanbieden
@endsection

@section('content')
    <div class="parent">
        <h2>Gerief aanbieden</h2>
        <form action="/offer/gerief" method="POST" class="form-spullen">
            @csrf
            <div id="uploadImg">
                <input type="file" name="offer-image" class="form-control"> <!--emoticon-->
                <label for="offer_image" class="form-label">Voeg foto toe</label>
            </div>

            <div id="offerTitle">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" class="form-control">
            </div>

            <select name="category" id="offer-category">
                <option value="" disabled selected>Categorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            
            <div id="price-toggle">
                <button id="free" class="activePrice">Gratis</button>
                <button id="cost" class="notActivePrice">Prijs</button>
            </div>

            <label for="price">Prijs</label>
            <input type="number" name="price" step="0.01" placeholder="Per dag">
            <label for="description">Productbeschrijving</label>
            <textarea name="description"></textarea>
            <label for="condition">Staat</label>
            <input type="text" name="condition">
            <input type="submit" value="Plaatsen">
        </form>
    </div>

    @component('components/navbar')
    @endcomponent

@endsection
