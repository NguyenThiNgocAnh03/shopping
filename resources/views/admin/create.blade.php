<h2>Thêm User</h2>

<form method="POST" action="/users">
    @csrf

    Username: <input type="text" name="username"><br>
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>

    <button type="submit">Thêm</button>
</form>
