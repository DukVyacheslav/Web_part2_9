<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="../scss/styles.css">
</head>
<body>
    <header>
        <h1>Главная страница</h1>
        <nav>
            <ul>
                <!-- Для активного пункта меню исключаем обработчики событий -->
                <li><a href="index.html" class="active"><img src="icons/icon2.png" alt="Иконка">Главная страница</a></li>
                
                <!-- Обработчики событий добавляем только для неактивных пунктов -->
                <li><a href="about.html"><img src="icons/icon1.png" alt="Иконка">Обо мне</a></li>
                <li><a href="interests.html"><img src="icons/icon1.png" alt="Иконка">Мои интересы</a></li>
                <li><a href="studies.html"><img src="icons/icon1.png" alt="Иконка">Учеба</a></li>
                <li><a href="photo album.html"><img src="icons/icon1.png" alt="Иконка">Фотоальбом</a></li>
                <li><a href="contact.html"><img src="icons/icon1.png" alt="Иконка">Контакт</a></li>
                <li><a href="test.html"><img src="icons/icon1.png" alt="Иконка">Тест по дисциплине</a></li>
                <li><a href="history.html"><img src="icons/icon1.png" alt="Иконка">История просмотра</a></li>
            </ul>
        </nav>
        <div id="current-time"></div>
    </header>
    <main>
        <h2>Дук Вячеслав Николаевич</h2>
        <p>Фотография: </p>
        <img src="images/photo.jpg" alt="Фотография Дук Вячеслава">
        <p>Группа: ИС/б-21-1з</p>
        <p>Номер и название настоящей лабораторной работы: ЛАБОРАТОРНЯ РАБОТА №5 «Исследование возможностей ускорения разработки клиентских приложений с использованием SASS»</p>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/tracking.js"></script>
    <script>
        $(document).ready(function() {
            // Функция изменения иконки при наведении мыши
            $('nav ul li').not('.active').hover(
                function() {
                    $(this).find('img').attr('src', 'icons/icon2.png');
                },
                function() {
                    $(this).find('img').attr('src', 'icons/icon1.png');
                }
            );

            // Функция для обновления текущего времени
            function updateTime() {
                const now = new Date();
                const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
                const formattedTime = now.toLocaleString('ru-RU', options);
                $('#current-time').text(formattedTime);
            }

            // Обновление времени каждую секунду
            setInterval(updateTime, 1000);
            // Первоначальный вызов функции для отображения времени сразу при загрузке страницы
            updateTime();

            // Отслеживание просмотра страницы
            trackPageView();
        });
    </script>
</body>
</html>