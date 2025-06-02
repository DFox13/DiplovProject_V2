document.addEventListener("DOMContentLoaded", function() {
    // Получаем все элементы с классом "center"
    const centers = document.querySelectorAll('.center');

    centers.forEach(center => {
        // Добавляем обработчик события наведения мыши
        center.addEventListener('mouseenter', function() {
            // Находим вложенный список и показываем его
            this.querySelector('ul').style.display = 'block';
        });

        // Добавляем обработчик события ухода мыши
        center.addEventListener('mouseleave', function() {
            // Находим вложенный список и скрываем его
            this.querySelector('ul').style.display = 'none';
        });
    });
});