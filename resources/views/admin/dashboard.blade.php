<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>

    <h1>Dashboard Admin</h1>

    <h3>Selamat Datang, {{ Auth::user()->name }}</h3>

    <p>Role : {{ Auth::user()->role }}</p>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">
            Logout
        </button>
    </form>

</body>
</html>