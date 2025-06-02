@extends('layouts.app')
@section('content')
    <h1>Добавить категорию услуги</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('menu.store.category') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Название категории:</label>
        <input type="text" name="title" id="title" required>
        
        <label for="image">Изображение:</label>
        <input type="file" name="image" id="image">
        <div class="form-group">
    <label>Показывать на главной:</label>
        <input type="checkbox" name="show_on_home" {{ $category->show_on_home ? 'checked' : '' }}>
    </div>
    <div class="form-group">
        <label>Показывать на странице услуг:</label>
        <input type="checkbox" name="show_on_services" {{ $category->show_on_services ? 'checked' : '' }}>
    </div>
    <div class="form-group">
        <label>Показывать на странице врачей:</label>
        <input type="checkbox" name="show_on_dentists" {{ $category->show_on_dentists ? 'checked' : '' }}>
    </div>
            <button type="submit">Добавить</button>
    </form>
    <a href="/account">Back</a>
@endsection