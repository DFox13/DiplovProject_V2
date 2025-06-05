@extends('layouts.app')

@section('content')
    <h1>Добавить акцию</h1>
    <form action="{{ route('admin.stock.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Название:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div>
            <label>Описание:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div>
            <label>Картинка:</label>
            <input type="file" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection