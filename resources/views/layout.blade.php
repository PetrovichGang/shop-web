<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Velosiped</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <header>
        <h1>VELOSIPED: @yield('title')</h1>
        <a href="/" @checked(Request::is('/'))>Главная</a>
        <a href="/cart" @checked(Request::is('/cart'))>Корзина</a>
    </header>

    <main>
        @section('main')
    </main>
</body>

</html>