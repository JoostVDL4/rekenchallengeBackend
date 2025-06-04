@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/loginPage.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
</head>

<div class="login__container">
<img class="flower__img flower__img--1" src="{{ asset('images/flowerblue.png') }}" alt="Flower Top Left">
<img class="flower__img flower__img--2" src="{{ asset('images/floweryellow.png') }}" alt="Flower Bottom Right">
<img class="flower__img flower__img--3" src="{{ asset('images/flowerorange.png') }}" alt="Flower Top Left">
<img class="flower__img flower__img--4" src="{{ asset('images/flowerred.png') }}" alt="Flower Bottom Right">

    <div class="login__card">
        <div class="login__card-header">{{ __('Login') }}</div>

        <div class="login__card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

               
                <div class="login__input-group">
                    <label for="email" class="login__label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="login__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="login__error">{{ $message }}</span>
                    @enderror
                </div>

                
                <div class="login__input-group">
                    <label for="password" class="login__label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="login__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="login__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="login__input-group">
                    <label class="login__checkbox">
                        <input class="login__checkbox-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="login__actions">
                    <button type="submit" class="login__submit-btn">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
