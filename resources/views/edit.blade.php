<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit User</title>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @include('headers.userheader')
</head>
<body>
<div class="container">
    <h1>Edit User</h1>

    <form action="{{ route('admin.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" disabled>
        </div>

        <div class="form-group">
            <label for="is_admin">Admin:</label>
            <select id="is_admin" name="is_admin">
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit">Update</button>
        <a href="{{ route('admin.index') }}">Back to List</a>
    </form>
</div>
</body>
</html>
