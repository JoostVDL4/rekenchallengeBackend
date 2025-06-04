@extends('layouts.app')

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg vraag toe</title>
    <link rel="stylesheet" href="{{ asset('css/editQuestion.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">

</head>

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


@section('content')
    <div class="container">
        <h1>Wijzig Vraag</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form" action="{{ route('questions.update', $question->vraag_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="vraag">Vraag:</label>
                <input type="text" class="form-control" name="vraag" id="vraag" value="{{ $question->vraag }}" required>
            </div>

            <div class="form-group">
                <label for="antwoord">Antwoord:</label>
                <input type="number" class="form-control" name="antwoord" id="antwoord" value="{{ $question->antwoord }}" required>
            </div>

            <div class="form-group">
                <label for="niveau">Niveau:</label>
                <input type="number" class="form-control" name="niveau" id="niveau" value="{{ $question->niveau }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>

        <a href="{{ route('questions.manage') }}" class="btn btn-overview">Terug naar het overzicht</a>
    </div>
@endsection
