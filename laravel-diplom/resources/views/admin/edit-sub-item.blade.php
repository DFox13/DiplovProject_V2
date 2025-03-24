@extends('layouts.app')

@section('content')
<h1>Редактировать подпункт</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('menu.update.sub-item', $subItem->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="category_id">Категория:</label>
        <select name="category_id" id="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $subItem->main_menu_item_id == $category->id ? 'selected' : '' }}>
                    {{ $category->title }}
                </option>
            @endforeach
        </select>

        <label for="title">Название подпункта:</label>
        <input type="text" name="title" id="title" value="{{ $subItem->title }}" required>

        <button type="submit">Обновить</button>
    </form>
@endsection