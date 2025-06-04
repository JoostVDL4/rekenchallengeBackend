@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <title>Dashboard</title>
@endsection

@section('content')
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

<div class="dashboard">
    <div class="dashboard-wrapper">
        <img class="flower__img flower__img--1" src="{{ asset('images/flowerblue.png') }}" alt="Flower Top Left">
        <img class="flower__img flower__img--2" src="{{ asset('images/floweryellow.png') }}" alt="Flower Bottom Right">
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reken-challenge Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="login__alert">{{ __('Je bent ingelogd!') }}</div>

                        <div class="dashboardContent">
                            <div class="mt-4">
                                <a href="{{ url('add-question') }}" class="button">Voeg hier rekenvragen toe!</a>
                            </div>

                            <div class="mt-4">
                                <a target="blank" href="{{ url('api/reken-vragen') }}" class="button">Bekijk hier de api!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
