<!DOCTYPE html>
<html>
<head>
    <title>Quản lý tài khoản</title>
</head>
<body>

<h2>Danh sách người dùng</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red">{{ session('error') }}</p>
@endif

<a href="/users/create">+ Thêm User</a>
<br><br>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Hành động</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>
            <form action="/users/{{ $user->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Xóa user này?')">Xóa</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>
