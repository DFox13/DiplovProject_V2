@extends('layouts.app')

@section('content')
<h1>Редактировать категорию</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('menu.update.category', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Название категории:</label>
        <input type="text" name="title" id="title" value="{{ $category->title }}" required>
        <button type="submit">Обновить</button>
    </form>
@endsection