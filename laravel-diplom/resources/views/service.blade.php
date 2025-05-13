@extends('layouts.app')

@section('content')
<div class="content">Services PAGE</div>

<h1>Список категорий</h1>

@if ($categories->isEmpty())
    <p>Пока нет категорий.</p>
@else
    <ul>
        @foreach ($categories as $category)
            <li>
                <strong>{{ $category->title }}</strong>
                @if ($category->subMenuItems->isNotEmpty())
                    <ul>
                        @foreach ($category->subMenuItems as $subItem)
                            <li>{{ $subItem->title }}</li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
@endif
@endsection