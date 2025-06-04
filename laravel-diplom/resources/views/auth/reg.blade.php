@extends('layouts.app')
@section('content')
<div class="auth-form">
@if ($errors->any())
<div class="uk-card uk-card-body">
    @foreach ($errors->all() as $error)
        <div class="uk-alert-danger" uk-alert>{{$error}}</div>
    @endforeach
</div>
@endif
<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m">
<form action="/reg" method="POST">
    @csrf
    <p>Ваш логин</p>
    <input type="text" name="name" class="uk-input">
    <p>Почта</p>
    <input type="email" name="email" class="uk-input">
    <p>Пароль</p>
    <input type="password" name="password" class="uk-input">
    <p>Повторите пароль</p>
    <input type="password" name="password_confirmation" class="uk-input">
    <div class="btn-auth">
    <button type="submit" class="uk-button uk-button-primary" style="width: 200px;">Регистрация</button>
    <a href="/auth">Авторизация</a></br>
    </div>
</form>
</div>
</div>
@endsection