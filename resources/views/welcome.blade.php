<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyLib</title>

    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    @auth
        @include('headers.userheader')
    @else
        @include('headers.guestheader')
    @endauth
</head>
<body>


<div class="welcome-container">
    <h1 class="welcome-title">
        Your personel <span class="highlight">library</span>
    </h1>
    <p class="welcome-description">
        With MyLib, don’t forget where you left off, what you need to read, what you’ve lent, or what you’ve borrowed.
    </p>
    <a href="/info" class="more-button">More Info</a>
</div>
</body>
</html>
