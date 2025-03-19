@extends('layouts.app')
@section('content')
@if ($errors->any())
<div class="uk-card uk-card-body">
    @foreach ($errors->all() as $error)
        <div class="uk-alert-danger" uk-alert>{{$error}}</div>
    @endforeach
</div>
@endif
<div class="uk-card uk-card-body">
<form action="/reg" method="POST">
    @csrf
    <p>login</p>
    <input type="text" name="name" class="uk-input">
    <p>email</p>
    <input type="email" name="email" class="uk-input">
    <p>pass</p>
    <input type="password" name="password" class="uk-input">
    <p>confirm pas</p>
    <input type="password" name="confirm_password" class="uk-input">
    <a href="/auth">Auth</a></br>
    <button type="submit" class="uk-button uk-button-primary">Registration</button>
</form>
</div>
@endsection