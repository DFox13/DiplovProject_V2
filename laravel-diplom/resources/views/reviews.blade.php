@extends('layouts.app')
@section('content')
        <div class="content">
            <div class="reviews">
                <h1>Отзывы</h1>

                @if ($reviews->isNotEmpty())
                    @foreach ($reviews as $review)
                        <div class="review-card">
                            <p>{{ $review->content }}</p>
                            <small>Автор: {{ $review->user->name }}</small>
                        </div>
                    @endforeach
                @else
                    <p>Пока нет отзывов.</p>
                @endif

                @auth
                    <div class="add-review">
                        <h3>Добавить отзыв</h3>
                        <form method="POST" action="{{ route('reviews.store') }}">
                            @csrf
                            <textarea name="content" placeholder="Ваш отзыв..." required></textarea>
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </form>
                    </div>
                @else
                    <div class="login-required">
                        <p>Чтобы оставить отзыв, войдите в аккаунт:</p>
                        <a href="/auth" class="btn btn-login">Войти</a>
                    </div>
                @endauth
            </div>
        </div>
@endsection