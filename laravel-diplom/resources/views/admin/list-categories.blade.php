@extends('layouts.app')

@section('content')
<h1>Список категорий</h1>

<a href="{{ route('menu.add.category') }}">Добавить категорию</a>

<ul>
    @foreach($categories as $category)
        <li>
            {{ $category->title }}
            <a href="{{ route('menu.edit.category', $category->id) }}">Редактировать</a>
            <form action="{{ route('menu.delete.category', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Удалить</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection