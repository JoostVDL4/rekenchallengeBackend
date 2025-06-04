@extends('layouts.app')

@section('content')
<h1>Admin Dashboard</h1>
<p>Welcome, {{ auth()->user()->name }}</p>

<!-- Add your form here -->
<form action="/submit-form" method="POST">
    @csrf
    <!-- Form fields -->
    <button type="submit">Submit</button>
</form>
@endsection

