@extends('layouts.app')

@section('content')
<h1>Заявки на обратный звонок</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Дата создания</th>
        </tr>
    </thead>
    <tbody>
        @foreach($callbacks as $callback)
            <tr>
                <td>{{ $callback->id }}</td>
                <td>{{ $callback->name }}</td>
                <td>{{ $callback->phone }}</td>
                <td>{{ $callback->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="/account">Back</a>
@endsection