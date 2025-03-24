@extends('layouts.app')

@section('content')
<h1>Список подпунктов</h1>

    <a href="{{ route('menu.add.sub-item') }}">Добавить подпункт</a>

    <ul>
        @foreach($subItems as $subItem)
            <li>
                {{ $subItem->title }} ({{ $subItem->mainMenuItem->title }})
                <a href="{{ route('menu.edit.sub-item', $subItem->id) }}">Редактировать</a>
                <form action="{{ route('menu.delete.sub-item', $subItem->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection