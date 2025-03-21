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
<form action="/auth" method="POST">
    @csrf
<p>Ваш логин</p>
    <input type="text" name="name" class="uk-input">
    <p>Ваш пароль</p>
    <input type="password" name="password" class="uk-input">
    <div class="btn-auth">
    <button type="submit" class="uk-button uk-button-primary" style="width: 200px;">Вход</button>
    <a href="/reg">Зарегестрироваться</a>
    </div>
</form>
</div>
</div>
@endsection