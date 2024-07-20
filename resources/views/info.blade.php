<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyLib - Information</title>

    <link href="{{ asset('css/info.css') }}" rel="stylesheet">
    @auth
        @include('headers.userheader')
    @else
        @include('headers.guestheader')
    @endauth

</head>
<body>

<div class="info-container1">
    <h1 class="info-title1">
        What is <span class="highlight">MyLib</span>?
    </h1>
    <p class="info-description1">
        MyLib is a personal library assistant.
    </p>
</div>

<div class="info-container2">
    <h1 class="info-title2">
       What are the <span class="highlight">features</span>?
    </h1>
    <p class="info-description2">
        With MyLib, you won't forget where you left off in a book, the books you need to read, or the books you have borrowed or lent.<br>
        You can track all these features with statistics and monitor your progress.
    </p>
</div>

</body>
</html>
