
const currentUrl = window.location.href;
const url = new URL(currentUrl);
const servicesParam = url.pathname.split('/').pop(); 
const scrollToTopButton = document.getElementById("scrollToTop");

// header



// Установка заголовка страницы на основе параметра URL (servicesParam)
switch (servicesParam) {
    case "":
        document.getElementById('valuePage').textContent = 'Главная';
        document.getElementById('valuePageMenu').textContent = 'Главная';
        break;
    case "services":
        document.getElementById('valuePage').textContent = 'Услуги';
        document.getElementById('valuePageMenu').textContent = 'Услуги';
        break;
    case "about":
        document.getElementById('valuePage').textContent = 'О нас';
        document.getElementById('valuePageMenu').textContent = 'О нас';
        break;
    case "stock":
        document.getElementById('valuePage').textContent = 'Акции';
        document.getElementById('valuePageMenu').textContent = 'Акции';
        break;
    case "contacts":
        document.getElementById('valuePage').textContent = 'Контакты';
        document.getElementById('valuePageMenu').textContent = 'Контакты';
        break;
    case "dentists":
        document.getElementById('valuePage').textContent = 'Врачи';
        document.getElementById('valuePageMenu').textContent = 'Врачи';
        break;
    case "reviews":
        document.getElementById('valuePage').textContent = 'Отзывы';
        document.getElementById('valuePageMenu').textContent = 'Отзывы';
        break;
    case "auth":
        document.getElementById('valuePage').textContent = 'Авторизация';
        document.getElementById('valuePageMenu').textContent = 'Авторизация';
        break;
    case "reg":
        document.getElementById('valuePage').textContent = 'Регистрация';
        document.getElementById('valuePageMenu').textContent = 'Регистрация';
        break;
    default:
        document.getElementById('valuePage').textContent = ''; 
        break;
}

$(document).ready(function() {

    $('#menuButton').click(function() {
        $('#navbar').toggleClass('open');
    });

    $(window).bind('scroll', function() {
        var ScrollPos = $(this).scrollTop(), 
            HeaderHeight = $('.header').height(); 
        
        if (ScrollPos > HeaderHeight) { 
            $('.nav').addClass('fixed'); 
            $('.content').css('margin-top', '50px');
        } else { 
            $('.nav').removeClass('fixed');
            $('.content').css('margin-top', '0'); 
        }
    });
});


window.onscroll = function() {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    scrollToTopButton.style.display = "block";
  } else {
    scrollToTopButton.style.display = "none";
  }
};

scrollToTopButton.onclick = function() {
  window.scrollTo({
    top: 0,
    behavior: "smooth" 
  });
};

// services
$(document).ready(function() {
    $('.lazyloaded').hover(
        function() {
            $(this).find('.sub-menu').stop(true, true).slideDown();
        }, 
        function() {
            $(this).find('.sub-menu').stop(true, true).slideUp();
        }
    );
});
// Получение модального окна
var modal = document.getElementById("myModal");

// Получение кнопки, открывающей модальное окно
var btn = document.getElementById("openModal");

// Получение элемента <span>, который закрывает модальное окно
var span = document.getElementsByClassName("close")[0];

// Когда пользователь нажимает на кнопку, откройте модальное окно
btn.onclick = function() {
    modal.style.display = "block";
}

// Когда пользователь нажимает на <span> (x), закройте модальное окно
span.onclick = function() {
    modal.style.display = "none";
}

// Когда пользователь щелкает за пределами модального окна, закройте его
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
