@extends('layouts.app')

@section('content')
<div class="wrapper">
    <h1>Список категорий</h1>

    @if ($categories->isEmpty())
        <p>Пока нет категорий.</p>
    @else
        <ul>
            @foreach ($categories as $category)
                <li>
                    <strong>{{ $category->title }}</strong>
                    <a href="{{ route('menu.edit.category', $category->id) }}">Редактировать</a>
                    <form action="{{ route('menu.delete.category', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить эту категорию?')">Удалить</button>
                    </form>

                    @if ($category->subMenuItems->isNotEmpty())
                        <ul>
                            @foreach ($category->subMenuItems as $subItem)
                                <li>{{ $subItem->title }}</li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
    <a href="/account">Back</a>
</div>
@endsection