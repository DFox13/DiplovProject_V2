@extends('layouts.app')

@section('content')
    <h1>Редактирование карточки врача</h1>
    <form action="{{ route('admin.dentists.update', $dentist->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">Имя</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $dentist->first_name) }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Фамилия</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $dentist->last_name) }}" required>
        </div>
        <div class="form-group">
            <label for="middle_name">Отчество</label>
            <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ old('middle_name', $dentist->middle_name) }}">
        </div>
        <div class="form-group">
            <label for="dolznost">Должность</label>
            <input type="text" name="dolznost" id="dolznost" class="form-control" value="{{ old('dolznost', $dentist->dolznost) }}" required>
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" id="status" class="form-control" required>
                <option value="врач" {{ old('status', $dentist->status) == 'врач' ? 'selected' : '' }}>Врач</option>
                <option value="ассистент" {{ old('status', $dentist->status) == 'ассистент' ? 'selected' : '' }}>Ассистент</option>
                <option value="администратор" {{ old('status', $dentist->status) == 'администратор' ? 'selected' : '' }}>Администратор</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image_path">Фото</label>
            <input type="file" name="image_path" id="image_path" class="form-control-file">
            @if ($dentist->image_path)
                <img src="{{ asset('images/' . $dentist->image_path) }}" alt="{{ $dentist->first_name }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection