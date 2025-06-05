@extends('layouts.app')

@section('content')
    <h1>Список акций</h1>
    <a href="{{ route('admin.stock.create') }}" class="btn btn-primary">Добавить новую акцию</a>
    <ul>
        @foreach($stocks as $stock)
            <li>
                {{ $stock->title }} <br>
                <img src="{{ asset('storage/' . $stock->image) }}" alt="{{ $stock->title }}" width="100">
                <p>{{ $stock->description }}</p>
                <form action="{{ route('menu.delete.stock', $stock->id) }}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить эту акцию?')">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection