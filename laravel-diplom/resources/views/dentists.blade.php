@extends('layouts.app')
@section('content')
<div class="content-doctors content">
    <h2>Наши Врачи</h2>
    <div class="list_doctors">
        @foreach ($staff->where('status', 'врач') as $member)
            <div class="doctor-card one-doctor a-one-doctor">
                <img src="{{ $member->image_path ? asset('images/' . $member->image_path) : 'default.jpg' }}" alt="{{ $member->first_name }} {{ $member->last_name }}">
                <h3>{{ $member->first_name }} {{ $member->last_name }} {{ $member->middle_name }}</h3>
                <p>{{ $member->dolznost }}</p>
            </div>
        @endforeach
    </div>

    <h2>Ассистенты</h2>
    <div class="list_assistents">
         @foreach ($staff->where('status', 'ассистент') as $member)
            <div class="assistant-card one-doctor a-one-doctor">
                <img src="{{ $member->image_path ? asset('images/' . $member->image_path) : 'default.jpg' }}" alt="{{ $member->first_name }} {{ $member->last_name }}">
                <h3>{{ $member->first_name }} {{ $member->last_name }} {{ $member->middle_name }}</h3>
                <p>{{ $member->dolznost }}</p>
            </div>
        @endforeach
    </div>

    <h2>Администраторы</h2>
    <div class="list_admin">
        @foreach ($staff->where('status', 'администратор') as $member)
            <div class="admin-card one-doctor a-one-doctor">
                <img src="{{ $member->image_path ? asset('images/' . $member->image_path) : 'default.jpg' }}" alt="{{ $member->first_name }} {{ $member->last_name }}">
                <h3>{{ $member->first_name }} {{ $member->last_name }} {{ $member->middle_name }}</h3>
                <p>{{ $member->dolznost }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection

