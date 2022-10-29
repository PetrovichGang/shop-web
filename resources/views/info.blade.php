@extends('layout')

@section('title', 'Информация')

@section('main')
    <div class="center-main">
        <span class="icon">i</span>
        <h2>{{ $title }}</h2>
        <span>{{ $info }}</span>
        <hr>
        <a href="/">← на главную</a>
    </div>
@endsection
