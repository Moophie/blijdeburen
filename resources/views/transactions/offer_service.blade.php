@extends('layouts/app')

@section('title')
    Dienst aanbieden
@endsection

@section('content')

    <h2>Dienst aanbieden</h2>

    <label for="title">Titel</label>
    <select name="category">
        @foreach ($categories as $category)
            <option value="{{ $category->name }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <div class="price-toggle">
        <button>Gratis</button>
        <button>Prijs</button>
    </div>

    <label for="price">Prijs</label>
    <input type="text" name="price" placeholder="Per dag">

    <label for="description">Beschrijving</label>
    <textarea name="description"></textarea>

    <input type="submit" value="Plaatsen">

    @component('components/navbar')
    @endcomponent

@endsection
