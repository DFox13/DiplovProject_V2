@extends('layouts.app')


@section('content')
    <h1>Список врачей</h1>
    <a href="{{ route('admin.dentists.create') }}" class="btn btn-success mb-3">Добавить врача</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Должность</th>
                <th>Статус</th>
                <th>Фото</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $dentist)
                <tr>
                    <td>{{ $dentist->id }}</td>
                    <td>{{ $dentist->first_name }} {{ $dentist->last_name }} {{ $dentist->middle_name }}</td>
                    <td>{{ $dentist->dolznost }}</td>
                    <td>{{ $dentist->status }}</td>
                    <td>
                        @if ($dentist->image_path)
                            <img src="{{ asset('images/' . $dentist->image_path) }}" alt="{{ $dentist->first_name }}" width="100">
                        @else
                            Нет фото
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.dentists.edit', $dentist->id) }}" class="btn btn-primary">Редактировать</a>
                        <form action="{{ route('admin.dentists.destroy', $dentist->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этого врача?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection