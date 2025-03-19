const currentUrl = window.location.href;
const url = new URL(currentUrl);
const servicesParam = url.pathname.split('/').pop(); 
const scrollToTopButton = document.getElementById("scrollToTop");

if (servicesParam == ""){
    document.getElementById('valuePage').textContent = 'Главная';
}
else if (servicesParam == "services"){
    document.getElementById('valuePage').textContent = 'Услуги';
}
else if (servicesParam == "about"){
    document.getElementById('valuePage').textContent = 'О нас';
}
else if (servicesParam == "stock"){
    document.getElementById('valuePage').textContent = 'Акции';
}
else if (servicesParam == "contacts"){
    document.getElementById('valuePage').textContent = 'Контакты';
}
else if (servicesParam == "dentists"){
    document.getElementById('valuePage').textContent = 'Врачи';
}
else if (servicesParam == "reviews"){
    document.getElementById('valuePage').textContent = 'Отзывы';
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