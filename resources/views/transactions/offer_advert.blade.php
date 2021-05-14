@extends('layouts/app')

@section('title')
    Zoekertje plaatsen
@endsection

@section('content')

    <h2>Zoekertje plaatsen</h2>
    <form action="" method="POST">
        @csrf
        <label for="title">Titel</label>
        <input type="text" name="title">
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="description">Beschrijving</label>
        <textarea name="description"></textarea>
        <input type="submit" value="Plaatsen">
    </form>

    @component('components/navbar')
    @endcomponent

@endsection
