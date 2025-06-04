<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Include Tailwind CSS (You can also link to a CDN or use Laravel Mix to compile your assets) -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
</head>

<body class="login">
    <img class="flower__img flower__img--1" src="{{ asset('images/flowerblue.png') }}" alt="Flower Top Left">
    <img class="flower__img flower__img--2" src="{{ asset('images/floweryellow.png') }}" alt="Flower Bottom Right">
    <img class="flower__img flower__img--3" src="{{ asset('images/flowerorange.png') }}" alt="Flower Top Left">
    <img class="flower__img flower__img--4" src="{{ asset('images/flowerred.png') }}" alt="Flower Bottom Right">
    <div class="login__page">
        <h1>Rekenchallenge admin</h1>

        @if (Route::has('login'))
            @auth
                <a href="{{ url('/home') }}" class="login__text">Login</a>
            @else
                <div class="login__button">
                    <a href="{{ route('login') }}" class="login__text">Login</a>
                </div>
            @endauth
        @endif



    </div>

</body>

</html>