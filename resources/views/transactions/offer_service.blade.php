@extends('layouts/app')

@section('title')
    Dienst aanbieden
@endsection

@section('content')
    <div class="parent">
        <h2>Dienst aanbieden</h2>
        <form action="/offer/gerief" method="POST" class="form-spullen">
            @csrf
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

            <div id="price">
                <label for="price" class="form-label">Prijs</label>
                <input type="number" name="price" step="0.01" placeholder="Per dag" class="form-control">
            </div>

            <input type="submit" value="Plaatsen" class="btn btn-primary">
        </form>
    </div>

    @component('components/navbar')
    @endcomponent

@endsection
