@extends('layout')

@section('title', $product->brand->name . ' ' . $product->model)

@section('main')
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
@endsection