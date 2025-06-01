@extends('layouts.app')

@section('content')

    <h2>Services PAGE</h2>

    @if ($categories->isEmpty())
    <p>Пока нет категорий.</p>
@else
    <div id="category_services">
        @foreach ($categories as $category)
            <div class="one_category lazyloaded" data-bg="https://www.cstom.ru/wp-content/uploads/2017/11/pervichniy_osmotr_services.jpg" style="background-image: url(&quot;https://www.cstom.ru/wp-content/uploads/2017/11/pervichniy_osmotr_services.jpg&quot;);">
                <div class="oc_img">
                    <div class="center">
                        <p class="h2"><a href="#">{{ $category->title }}</a></p>
                        @if ($category->subMenuItems->isNotEmpty())
                        <ul>
                            @foreach ($category->subMenuItems as $subItem)
                                <li><a href="#">{{ $subItem->title }}</li>
                            @endforeach
                        </ul>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection