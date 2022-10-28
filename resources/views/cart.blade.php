<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Корзина</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <header>
        <h1>VELOSIPED: Корзина</h1>
        <a href="/">Главная</a>
        <a href="/cart" here>Корзина</a>
    </header>
    <main>
        <section class="grow">
            @foreach ($products as $p)
                <article>
                    <a href="/product/{{ $p->id }}" class="preview">
                        <img src="{{ $p->image }}" width="200" height="200">
                    </a>
                    <a href="/?brands[]={{ $p->brand->id }}">{{ $p->brand->name }}</a>
                    <a href="/product/{{ $p->id }}"><h4>{{ $p->model }}</h4></a>
                    <div class="h-panel">
                        <i>{{ $p->type }}</i>
                        <b>{{ $p->price }} руб.</b>
                    </div>
                    <div class="h-panel">
                        <a href="/cart/minus/{{ $p->id }}">-</a>
                        <center>{{ $cart[$p->id] }}</center>
                        <a href="/cart/plus/{{ $p->id }}">+</a>
                    </div>
                    <div class="h-panel">
                        <a href="/cart/remove/{{ $p->id }}">Убрать</a>
                    </div>
                </article>
            @endforeach
        </section>
        <section class="sidebar order">
            <h2>Заказ</h2>
            <h3>На сумму {{ $price }} руб.</h3>
            <form action="/order" method="POST">
                @csrf
                <label>
                    ФИО
                    <input type="text" name="name">
                </label>
                <label>
                    Телефон
                    <input type="phone" name="phone">
                </label>
                <label>
                    Email
                    <input type="email" name="email">
                </label>
                <label>
                    Адрес
                    <input type="text" name="address">
                </label>
                <label>
                    Примечания
                    <input type="text" name="etc">
                </label>
                <div class="h-panel">
                    <input type="submit" value="Сделать заказ">
                    <a href="/cart/clear" class="opacity">Сбросить</a>
                </div>
            </form>
        </section>
    </main>
</body>

</html>
