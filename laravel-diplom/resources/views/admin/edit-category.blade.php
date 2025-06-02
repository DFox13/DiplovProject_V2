@extends('layouts.app')
@section('content')
<div class="wrapper">
    <h1>Редактировать категорию</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('menu.update.category', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="title">Название категории:</label>
        <input type="text" name="title" id="title" value="{{ $category->title }}" required>
        
        <label for="image">Изображение:</label>
        <input type="file" name="image" id="image">
        @if($category->image)
            <img src="{{ asset('storage/' . $category->image) }}" alt="Current image" width="100">
        @endif
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
        <button type="submit">Обновить</button>
    </form>
    <a href="/account">Back</a>
</div>
@endsection