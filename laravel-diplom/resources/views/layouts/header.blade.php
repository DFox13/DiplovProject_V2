<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="valuePage"></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.23.3/dist/css/uikit.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.23.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.23.3/dist/js/uikit-icons.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    </head>
<body>
    
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <img src="https://www.cstom.ru/wp-content/themes/cstom/images/logo.svg" alt="Логотип">
            </div>
            <div class="">
            <a href=""><img src="https://www.cstom.ru/wp-content/themes/cstom/images/visually.svg" style="width: 70px;"></a>
            </div>
            <div >
                <p class="tel"><a href="https://www.cstom.ru/tel:84812315115">8 (4812) 315-115</a></p>
                <p class="tel"><a href="https://www.cstom.ru/tel:89107104824">8 (910) 710-48-24</a></p>
            </div>
            <div class="btn-header">
            <a href="#" id="openModal" class="btn-head ">Заказать обратный звонок</a>
            
                
                @if (Auth::check())
                <a href="/account" class="btn-head ">{{ Auth::user()->name }}</a>
                    @else
                        <a href="/auth" class="btn-head ">Авторизироваться</a>
                    @endif
                
            </div>
            <div class="slogan">
                <div class="address">
                    <a href="">г. Смоленск, ул. Кирова, д. 29</a>
                    <p>по будням с 8:30 до 21:00<br>
                    в выходные с 9:00 до 18:00</p>
                </div>
            </div>
        </div>
        <div class="menu-button" id="menuButton">☰ <span id="valuePageMenu"> </span></div>
        <div class="nav" id="navbar">
            <a href="/">Главная</a>
            <a href="/services">Услуги</a>
            <a href="/about">О нас</a>
            <a href="/stock">Акции</a>
            <a href="/contacts">Контакты</a>
            <a href="/dentists">Врачи</a>
            <a href="/reviews">Отзывы</a>
        </div>
        <button id="scrollToTop" style="display: none;">Вверх <i class="fa-solid fa-arrow-up"></i></button>
    
