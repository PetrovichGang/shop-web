<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Магазин</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <header>
        <h1>VELOSIPED</h1>
        <a href="/" here>Главная</a>
        <a href="/cart">Корзина</a>
    </header>

    <main>
    <section class="sidebar">
        <form action="/">
            <input type="text" name="q" value="{{ $_GET['q'] ?? '' }}" placeholder="Поиск..."><br>
            <h3>Производители</h3>
            @foreach ($brands as $b)
                <label>
                    <input type="checkbox" name="b[]" value="{{ $b->id }}" @checked(in_array($b->id, $_GET['b'] ?? []))
                    {{ $b->name }}
                </label>
            @endforeach
            <br>
            <h3>Тип</h3>
            @foreach (['Горный', 'Женский', 'Детский'] as $t)
                <label>
                    <input type="checkbox" name="t[]" value="{{ $t }}"
                        {!! in_array($t, $_GET['t'] ?? []) ? 'checked' : '' !!}>
                    {{ $t }}
                </label>
            @endforeach
            <br>
            <div class="h-panel">
                <input type="submit" value="Показать">
                <a href="/" class="opacity">Сбросить</a>
            </div>
        </form>
    </section>
    <section class="grow">
    @foreach ($products as $p)
        <article>
            <a href="/product/{{ $p['product']->id }}" class="preview">
                <img src="{{ $p['product']->image }}" width="200" height="200">
            </a>
            <a href="/?brands[]={{ $p['product']->brand->id }}">{{ $p['product']->brand->name }}</a>
            <a href="/product/{{ $p['product']->id }}"><h4>{{ $p['product']->model }}</h4></a>
            <div class="h-panel">
                <i>{{ $p['product']->type }}</i>
                <b>{{ $p['product']->price }} руб.</b>
            </div>
            <div class="h-panel">
                @if ($p['inCart'])
                <a href="/cart">Корзина</a>
                <a href="/cart/remove/{{ $p['product']->id }}">Убрать</a>
                @else
                <a href="/cart/add/{{ $p['product']->id }}">Купить</a>
                @endif
            </div>
        </article>
    @endforeach
    </section>
    </main>
</body>

</html>