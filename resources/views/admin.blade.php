<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyLib</title>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @include('headers.userheader')
</head>
<body>
<div class="container-outside">
<div class="container">
    <h1>Admin Panel</h1>
    <table class="user-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                <td>
                    <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-edit">Edit</a>
                    <form action="{{ route('admin.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</body>
</html>
