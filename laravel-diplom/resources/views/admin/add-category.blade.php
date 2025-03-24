@extends('layouts.app')

@section('content')
<h1>Добавить категорию услуги</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('menu.store.category') }}" method="POST">
        @csrf
        <label for="title">Название категории:</label>
        <input type="text" name="title" id="title" required>
        <button type="submit">Добавить</button>
    </form>
@endsection