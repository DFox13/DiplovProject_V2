@extends('layouts.app')
@section('content')

       <div class="fotorama fotorama_pc fotorama1748789408355" data-width="100%" data-height="auto" data-fit="cover" data-max-width="100%" data-loop="true" data-autoplay="6000">
    <div class="fotorama__wrap fotorama__wrap--css3 fotorama__wrap--slide fotorama__wrap--toggle-arrows" >
        <div class="fotorama__stage" style="width: 110%; height: 579px;">
            <div class="fotorama__stage__shaft" >
                <div class="fotorama__stage__frame fotorama__loaded fotorama__loaded--img fotorama__active" style="left: 0px;"><img src="https://www.cstom.ru/wp-content/uploads/2024/10/fotorama.jpg"  >
                    <div class="fotorama__html">
                        <div data-img="https://www.cstom.ru/wp-content/uploads/2024/10/fotorama.jpg"><a href="https://www.cstom.ru/services/osmotr"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="services">
    <div class="center">
        <p class="h2">Наши услуги</p>
        <div class="services_list">

        @foreach ($categories->where('show_on_home', true) as $category)
        <div class="one_service">
                <div class="in_service">
                <p class="img">
                        <img src="{{ $category->image ? asset('storage/' . $category->image) : 'default.jpg' }}" alt="{{ $category->title }}">
                </p>
                        <p class="name"><a href="https://www.cstom.ru/services/osmotr">{{ $category->title }}</a></p>
                        <ul>
                                @foreach ($category->subMenuItems as $subItem)
                                <li><a href="#">{{ $subItem->title }}</li>
                            @endforeach
                        </ul>
                </div>
        </div>

            
        @endforeach
            
        </div>
    </div>
</div>
<div id="why_me">
    <div class="center">
        <div class="left_whyme">
            <p class="h2">Почему выбирают нашу клинику</p>
            <div class="list_whyme">
                <div class="one_whyme"> <noscript><img src="https://www.cstom.ru/wp-content/uploads/2024/10/icon1.png" alt="Инновационные технологии" /></noscript><img class=" lazyloaded" src="https://www.cstom.ru/wp-content/uploads/2024/10/icon1.png" data-src="https://www.cstom.ru/wp-content/uploads/2024/10/icon1.png" alt="Инновационные технологии">
                    <p><span>Инновационные технологии</span> Цифровая точная диагностика и материалы от лидеров рынка</p>
                </div>
                <div class="one_whyme one_whyme_right"> <noscript><img src="https://www.cstom.ru/wp-content/uploads/2024/10/icon2.png" alt="Удобное расположение стоматологической клиники" /></noscript><img class=" lazyloaded" src="https://www.cstom.ru/wp-content/uploads/2024/10/icon2.png" data-src="https://www.cstom.ru/wp-content/uploads/2024/10/icon2.png" alt="Удобное расположение стоматологической клиники">
                    <p><span>Удобное расположение стоматологической клиники</span> Наша стоматология работает без выходных в центре города по адресу ул.Кирова, д.29, телефоны для записи в контактах!</p>
                </div>
                <div class="one_whyme"> <noscript><img src="https://www.cstom.ru/wp-content/uploads/2024/10/icon3.png" alt="Опытные врачи" /></noscript><img class=" lazyloaded" src="https://www.cstom.ru/wp-content/uploads/2024/10/icon3.png" data-src="https://www.cstom.ru/wp-content/uploads/2024/10/icon3.png" alt="Опытные врачи">
                    <p><span>Опытные врачи</span> Прием в стоматологии ведут команда опытных врачей, включая узких специалистов</p>
                </div>
                <div class="one_whyme one_whyme_right"> <noscript><img src="https://www.cstom.ru/wp-content/uploads/2024/10/icon4.png" alt="Скидки постоянным клиентам" /></noscript><img class=" lazyloaded" src="https://www.cstom.ru/wp-content/uploads/2024/10/icon4.png" data-src="https://www.cstom.ru/wp-content/uploads/2024/10/icon4.png" alt="Скидки постоянным клиентам">
                    <p><span>Скидки постоянным клиентам</span> Мы всегда благодарны нашим пациентам, которые рекомендуют нашу стоматологию и предоставляем хорошую скидку</p>
                </div>
                <div class="one_whyme"> <noscript><img src="https://www.cstom.ru/wp-content/uploads/2024/10/icon5.png" alt="Собственная зуботехническая лаборатория" /></noscript><img class=" lazyloaded" src="https://www.cstom.ru/wp-content/uploads/2024/10/icon5.png" data-src="https://www.cstom.ru/wp-content/uploads/2024/10/icon5.png" alt="Собственная зуботехническая лаборатория">
                    <p><span>Собственная зуботехническая лаборатория</span> Производство индивидуальных коронок при имплантации</p>
                </div>
                <div class="one_whyme one_whyme_right"> <noscript><img src="https://www.cstom.ru/wp-content/uploads/2024/10/icon6.png" alt="Гарантия" /></noscript><img class=" lazyloaded" src="https://www.cstom.ru/wp-content/uploads/2024/10/icon6.png" data-src="https://www.cstom.ru/wp-content/uploads/2024/10/icon6.png" alt="Гарантия">
                    <p><span>Гарантия</span> Современный подход и большой опыт позволяет нам предлагать долгосрочную гарантию на многие категории услуг в нашей стоматологии</p>
                </div>
            </div>
        </div>
        <div class="right_whyme">
            <div class="post_one">
                <h1>Стоматология в Смоленске для всей семьи</h1>
                <p>Клиника «Центр Семейной Стоматологии» в Смоленске выполняет весь спектр услуг в лечении зубов, по исправлению прикуса (ортодонтии), протезированию и имплантации, а также услуг эстетической стоматологии.</p>
                <p>Предлагаем индивидуальный подход к каждому пациенту, включая детей с 3-х лет и беременных. Приходите к нам в клинику «Центр Семейной Стоматологии» на <a href="/services/osmotr">бесплатную консультацию</a>. Подробная информация по лечению зубов <a href="https://www.cstom.ru/credit">в рассрочку</a>, <a href="https://www.cstom.ru/category/sale">акциям и скидкам.</a></p>
            </div>
        </div>
    </div>
    <div class="center center_for_btn">
        <p class="button"><a href="/contact"><noscript><img src="https://www.cstom.ru/wp-content/themes/cstom/images/order_doctor.png" alt="" /></noscript><img class="lazyload" src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20210%20140%22%3E%3C/svg%3E" data-src="https://www.cstom.ru/wp-content/themes/cstom/images/order_doctor.png" alt="">Записаться на приём</a></p>
    </div>
</div>
@endsection