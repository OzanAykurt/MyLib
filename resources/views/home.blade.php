<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyLib</title>

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    @include('headers.userheader')
</head>
<body>
<div class="user-welcome-container">
    <h1 class="user-welcome-title">
        @if (Auth::user()->is_admin == 1)
            Welcome, admin {{ Auth::user()->name }}!
        @else
            Welcome, {{ Auth::user()->name }}!
        @endif
    </h1>
    <p class="user-welcome-description">
        Your personal library is waiting for you.
    </p>
</div>

<div class="panel-container">
    @if (Auth::user()->is_admin == 1)
        <div class="panel-row">
            <a href="/admin" class="panel-block">Admin Panel</a>
        </div>
    @endif
    <div class="panel-row">
        <a href="/books" class="panel-block">My Books</a>
        <a href="/borrow" class="panel-block">Borrow</a>
        <a href="/statistics" class="panel-block">Statistics</a>
        <a href="/settings" class="panel-block">Settings</a>
    </div>
</div>
</body>
</html>
