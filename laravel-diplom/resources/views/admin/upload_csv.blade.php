@extends('layouts.app')

@section('content')
    <h2>Загрузить категории из CSV</h2>
    <form action="{{ route('upload.csv') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Выберите CSV файл</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Загрузить</button>
    </form>
    <a href="/account">Back</a>
@endsection