@extends('layouts.app')
@section('content')
<div class="">
<h1>Добро пожаловать, {{ Auth::user()->name }}, это страница Вашего аккаунта </h1>
</div>
<div class="">History of visits</div>
<div class="">discount</div>
<div class="">update profile</div>

@endsection