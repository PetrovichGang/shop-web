<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->brand->name }} {{ $product->model }}</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <header>
        <h1>VELOSIPED</h1>
        <a href="/">Главная</a>
        <a href="/cart">Корзина</a>
    </header>

    <main>
    <section>
        <article>
            <a href="/product/{{ $product->id }}" class="preview">
                <img src="{{ $product->image }}" width="512" height="512">
            </a>
        </article>
    </section>
    <section>
        <article>
            <a href="/?brands[]={{ $product->brand->id }}">{{ $product->brand->name }}</a>
            <a href="/product/{{ $product->id }}"><h4>{{ $product->model }}</h4></a>
            <div class="h-panel">
                <i>{{ $product->type }}</i>
                <b>{{ $product->price }} руб.</b>
            </div>
            @if ($inCart)
            <div class="h-panel">
                <a href="/cart">Перейти в корзину</a>
            </div>
            <div class="h-panel">
                <a href="/cart/remove/{{ $product->id }}">Убрать из корзины</a>
            </div>
            @else
            <div class="h-panel">
                <a href="/cart/add/{{ $product->id }}">Добавить в корзину</a>
            </div>
            @endif
        </article>
    </section>
    </main>
</body>

</html>