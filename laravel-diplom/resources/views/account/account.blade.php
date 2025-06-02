@extends('layouts.app')
@section('content')
<div class="">
    <h1>Добро пожаловать, {{ Auth::user()->name }}, это страница Вашего аккаунта </h1>
</div>
<div class="mt-4">
    @if (Auth::user()->notifications()->where('is_read', false)->exists())
        <div class="alert alert-success">
            <h2>Новые уведомления:</h2>
            @foreach (Auth::user()->notifications()->where('is_read', false)->get() as $notification)
                <div class="notification-item" notification-id="{{ $notification->id }}">
                    {{ $notification->message }}
                    <a href="/notifications/{{ $notification->id }}/read">✓</a>
                </div>
            @endforeach
        </div>
    @else
        <p>Нет новых уведомлений.</p>
    @endif
</div>

@if (Auth::user()->isUser())
    <div class="mt-4">
        <div class="">История посещений</div>
        <div class="">Скидки</div>
        <div class="">Обновить профиль</div>
    </div>
@endif

<form action="{{ route('logout') }}" method="POST" style="display: inline-block;">
    @csrf
    <button type="submit" class="btn btn-danger">Выйти</button>
</form>

@if(Auth::user()->isAdmin())
    <div class="mt-4">
        <h2>Административные инструменты</h2>
        <ul>
            <li><a href="{{ route('upload.form') }}">Добавить категории подкатегории из csv файла</a></li>
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
            <li><a href="{{ route('upload.form') }}">Добавить категории подкатегории из csv файла</a></li>
            <li><a href="{{ route('admin.manage-roles') }}">Сменить роль пользователя</a></li>
            <li><a href="{{ route('menu.add.category') }}">Добавить категорию</a></li>
            <li><a href="{{ route('menu.list.categories') }}">Список категорий</a></li>
            <li><a href="{{ route('menu.add.sub-item') }}">Добавить подпункт</a></li>
            <li><a href="{{ route('menu.list.sub-items') }}">Список подпунктов</a></li>
        </ul>
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    function markAsRead(notificationId) {
        fetch(`/notifications/${notificationId}/read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            }
        }).then(() => {
            document.querySelector(`.notification-item[notification-id="${notificationId}"]`).remove();
        });
    }
});
</script>
@endsection