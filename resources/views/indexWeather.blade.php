<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weather Application</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    <body class="antialiased">
        <form id="form">
             <label for=""> Please Enter  Name The Cite : </label><br><br>
            <input
                type="text"
                name="city"
                id="search"
                placeholder="Search by location"
                autocomplete="off"
            />
        </form>

        <main id="main"></main>

        <script src="{{ asset('js/apiWeather.js') }}"></script>
    </body>
</html>
