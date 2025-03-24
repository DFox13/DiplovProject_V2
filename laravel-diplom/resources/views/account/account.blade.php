@extends('layouts.app')
@section('content')
<div class="">
<h1>Добро пожаловать, {{ Auth::user()->name }}, это страница Вашего аккаунта </h1>
</div>
<div class="">History of visits</div>
<div class="">discount</div>
<div class="">update profile</div>
<form action="{{ route('logout') }}" method="POST" style="display: inline-block;">
    @csrf
    <button type="submit" class="btn btn-danger">Выйти</button>
</form>
@if(Auth::user()->isAdmin())
    <div class="mt-4">
        <h2>Административные инструменты</h2>
        <ul>
            <li><a href="{{ route('menu.add.category') }}">Добавить категорию</a></li>
            <li><a href="{{ route('menu.list.categories') }}">Список категорий</a></li>
            <li><a href="{{ route('menu.add.sub-item') }}">Добавить подпункт</a></li>
            <li><a href="{{ route('menu.list.sub-items') }}">Список подпунктов</a></li>
        </ul>
    </div>
@elseif (Auth::user()->isSystemAdmin())
<div class="mt-4">
        <h2>Административные инструменты</h2>
        <ul>
            <li><a href="{{ route('admin.manage-roles') }}">Сменить роль пользователя</a></li>
            <li><a href="{{ route('menu.add.category') }}">Добавить категорию</a></li>
            <li><a href="{{ route('menu.list.categories') }}">Список категорий</a></li>
            <li><a href="{{ route('menu.add.sub-item') }}">Добавить подпункт</a></li>
            <li><a href="{{ route('menu.list.sub-items') }}">Список подпунктов</a></li>
        </ul>
    </div>
@endif

@endsection