<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg vraag toe</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <div class="navbar">
            <div class="navbar-left">
                <a href="{{ url('/home') }}" class="navbar-link">{{ __('Dashboard') }}</a>
            </div>
            <div class="navbar-right">
                <span class="username">{{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </header>
    <img class="flower__img flower__img--1" src="{{ asset('images/flowerblue.png') }}" alt="Flower Top Left">
    <img class="flower__img flower__img--2" src="{{ asset('images/floweryellow.png') }}" alt="Flower Bottom Right">
    <img class="flower__img flower__img--3" src="{{ asset('images/flowerorange.png') }}" alt="Flower Top Left">
    <img class="flower__img flower__img--4" src="{{ asset('images/flowerred.png') }}" alt="Flower Bottom Right">

    <form class="question__form" action="{{ route('questions.store') }}" method="POST">
        
        <h1>Voeg een nieuwe vraag toe</h1>
        @csrf
        <label class="question__input" for="vraag">Vraag: </label>
        <input class="question__input_field" placeholder="gebruik + - / of *" type="text" name="vraag" id="vraag"
        pattern="^[\d+\.\d+|\d+|\s+|[\+\-\*\/]]+$" required><br><br>

        <label class="question__input" for="antwoord">Antwoord: </label>
        <input class="question__input_field" placeholder="alleen decimaal, bijv 80.5" type="text" name="antwoord"
            id="antwoord" pattern="^\d+(\.\d{1})?$" required><br><br>

        <label class="question__input" for="niveau">Niveau: </label>
        <input class="question__input_field" placeholder="2, 3, or 4" type="text" name="niveau" id="niveau"
            pattern="^(2|3|4)$" required><br><br>

        <button class="button__form" type="submit">Voeg toe</button>
        <a href="{{ route('questions.manage') }}" class="button__form button-manage">Vragen Aanpassen</a> 
    </form>

</body>

</html>
