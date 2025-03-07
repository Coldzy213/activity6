<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <title>Dashboard</title>
</head>

<body>
    <header>
        <h1>Welcome
            {{ auth()->user()->firstname }}
        </h1>
        <a class="btn" href="{{ route('logout') }}">Logout</a>
    </header>
    <main>
        <div class="content">
            <h2>Dashboard</h2>
            <p>Welcome to the dashboard</p>
        </div>

    </main>

</body>

</html>
