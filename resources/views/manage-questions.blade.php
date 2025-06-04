@extends('layouts.app')


<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg vraag toe</title>
    <link rel="stylesheet" href="{{ asset('css/manageQuestion.css') }}">
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
        <h1>Beheer Vragen</h1>
        
      
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr class="table__elements">
                    <th scope="col">Vraag</th>
                    <th scope="col">Antwoord</th>
                    <th scope="col">Niveau</th>
                    <th scope="col">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->vraag }}</td>
                        <td>{{ $question->antwoord }}</td>
                        <td>{{ $question->niveau }}</td>
                        <td class="buttons">
                       
                            <a href="{{ route('questions.edit', $question->vraag_id) }}" class="btn btn-primary">Bewerken</a>
                        
                            <form action="{{ route('questions.destroy', $question->vraag_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a href="{{ url('/add-question') }}" class="btn btn-add">Nieuwe Vraag Toevoegen</a>
    </div>
@endsection
