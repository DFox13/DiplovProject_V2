@extends('layouts.app')

@section('content')
    <h2>Услуги нашей клиники</h2>

    @if ($categories->isEmpty())
        <p>Пока нет категорий.</p>
    @else
        <div id="category_services">
            @foreach ($categories->where('show_on_services', true) as $category)
                <div class="one_category">
                    <div class="oc_img" style="background-image: url('{{ $category->image ? asset('storage/' . $category->image) : 'default.jpg' }}');">
                        <div class="center">
                            <p class="h2"><a href="#">{{ $category->title }}</a></p>
                            @if ($category->subMenuItems->isNotEmpty())
                                <ul class="sub-menu">
                                    @foreach ($category->subMenuItems as $subItem)
                                        <li><a href="#">{{ $subItem->title }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const categories = document.querySelectorAll('.one_category');

    categories.forEach(category => {
        category.addEventListener('mouseleave', function() {
            this.querySelector('.sub-menu').style.display = 'none';
        });
        category.addEventListener('mouseenter', function() {
            this.querySelector('.sub-menu').style.display = 'block';
        });

    });
});
</script>
@endsection