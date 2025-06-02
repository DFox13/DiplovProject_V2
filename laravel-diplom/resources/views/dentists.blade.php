@extends('layouts.app')
@section('content')
<div class="content-doctors content">
    <h2>Наши Врачи</h2>
    <div class="list_doctors">
        @foreach ($staff->where('position', 'doctor') as $member)
            <div class="doctor-card">
                <img src="{{ $member->image ? asset('storage/' . $member->image) : 'default.jpg' }}" alt="{{ $member->name }}">
                <h3>{{ $member->name }}</h3>
            </div>
        @endforeach
    </div>

    <h2>Ассистенты</h2>
    <div class="list_assistents">
        @foreach ($staff->where('position', 'assistant') as $member)
            <div class="assistant-card">
                <img src="{{ $member->image ? asset('storage/' . $member->image) : 'default.jpg' }}" alt="{{ $member->name }}">
                <h3>{{ $member->name }}</h3>
            </div>
        @endforeach
    </div>

    <h2>Администраторы</h2>
    <div class="list_admin">
        @foreach ($staff->where('position', 'admin') as $member)
            <div class="admin-card">
                <img src="{{ $member->image ? asset('storage/' . $member->image) : 'default.jpg' }}" alt="{{ $member->name }}">
                <h3>{{ $member->name }}</h3>
            </div>
        @endforeach
    </div>
</div>
        <div class="content-doctors content">
                <h2>Наши Врачи</h2>
                <div class="list_doctors">
                </div>
                <h2>Ассистенты</h2>
                <div class="list_assistents"></div>
                <h2>Администраторы</h2>
                <div class="list_admin"></div>
        </div>
<script src="/assets/js/scriptDentists.js"> </script>
@endsection
