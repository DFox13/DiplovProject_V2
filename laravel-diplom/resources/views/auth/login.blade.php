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
<form action="/auth" method="POST">
    @csrf
<p>login</p>
    <input type="text" name="name" class="uk-input">
    <p>pass</p>
    <input type="password" name="password" class="uk-input">
    <button type="submit" class="uk-button uk-button-primary">login</button>
    <a href="/reg">Create new account</a>
</form>
</div>
@endsection