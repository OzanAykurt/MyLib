<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyLib - Log In</title>

    <link href="{{ asset('css/info.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login-register.css') }}"
    @include('headers.guestheader')
</head>
<body>
<div class="outside-login-container">
    <div class="login-container">
        <h1>Log In to MyLib</h1>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Log In</button>
        </form>
    </div>
</div>
</body>
</html>
