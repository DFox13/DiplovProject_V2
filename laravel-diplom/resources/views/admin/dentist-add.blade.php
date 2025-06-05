@extends('layouts.app')

@section('content')
    <h1>Добавление нового врача</h1>
    <form action="{{ route('admin.dentists.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="first_name">Имя</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Фамилия</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="middle_name">Отчество</label>
            <input type="text" name="middle_name" id="middle_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="dolznost">Должность</label>
            <input type="text" name="dolznost" id="dolznost" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" id="status" class="form-control" required>
                <option value="врач">Врач</option>
                <option value="ассистент">Ассистент</option>
                <option value="администратор">Администратор</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image_path">Фото</label>
            <input type="file" name="image_path" id="image_path" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection