@extends('layouts.app')

@section('content')
    <h1>Список акций</h1>
    <ul>
        @foreach($stocks as $stock)
            <li>
                {{ $stock->title }} <br>
                <img src="{{ $stock->image_url }}" alt="" width="100">
                <p>{{ $stock->description }}</p>
                
            </li>
        @endforeach
    </ul>
@endsection