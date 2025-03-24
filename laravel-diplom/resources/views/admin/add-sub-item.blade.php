@extends('layouts.app')

@section('content')
<h1>Добавить подпункт услуги</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('menu.store.sub-item') }}" method="POST">
        @csrf
        <label for="category_id">Категория:</label>
        <select name="category_id" id="category_id" required>
            <option value="">Выберите категорию</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        <label for="title">Название подпункта:</label>
        <input type="text" name="title" id="title" required>

        <button type="submit">Добавить</button>
    </form>
@endsection