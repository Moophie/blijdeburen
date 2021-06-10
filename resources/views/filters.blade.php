<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('csrftoken')
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="{{ url()->previous() }}"><img src="/images/icons/icon_back.svg" width="50px" alt=""></a>
        </div>
        <form action="/home/{{ $mode }}" method="GET">
            <div>
                <p>Sorteren op</p>
                <select name="sort" id="sort">
                    <option value="price">Prijs</option>
                    <option value="distance">Afstand</option>
                </select>
                <input type="radio" id="asc" name="sort_direction" value="asc" checked>
                <label for="asc">Oplopend</label><br>
                <input type="radio" id="desc" name="sort_direction" value="desc">
                <label for="desc">Afloped</label><br>
            </div>
            <div>
                <p>Prijs</p>

                <label for="minprice">Prijs (0 - 100)</label>
                <input type="number" id="minprice" name="minprice" min="0" max="100" value="0">
                <input type="number" id="maxprice" name="maxprice" min="0" max="100" value="20">

                <button>Gratis</button>
            </div>
            <div>
                <p>Afstand</p>

                <label for="mindistance">Afstand (0 - 100)</label>
                <input type="number" id="mindistance" name="maxdistance" min="0" max="100" value="0">
                <input type="number" id="mindistance" name="maxdistance" min="0" max="100" value="30">
            </div>

            <div>
                <p>Minimale beoordeling</p>

                <label for="rating">Beoordeling (1 - 5)</label>
                <input type="range" id="rating" name="rating" min="1" max="5">
            </div>

            <input type="reset" value="Reset">
            <input type="submit" value="Opdracht verfijnen">

        </form>


        <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
