<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обо мне</title>
    <link rel="stylesheet" href="../scss/styles.css">
</head>
<body>
    <header>
        <h1>Обо мне</h1>
        <nav>
            <ul>
                <!-- Обработчики событий добавляем только для неактивных пунктов -->
                <li><a href="index.html"><img src="icons/icon1.png" alt="Иконка">Главная страница</a></li>
                <li><a href="about.html" class="active"><img src="icons/icon2.png" alt="Иконка">Обо мне</a></li>
                <li><a href="interests.html"><img src="icons/icon1.png" alt="Иконка">Мои интересы</a></li>
                <li><a href="studies.html"><img src="icons/icon1.png" alt="Иконка">Учеба</a></li>
                <li><a href="photo album.html"><img src="icons/icon1.png" alt="Иконка">Фотоальбом</a></li>
                <li><a href="contact.html"><img src="icons/icon1.png" alt="Иконка">Контакт</a></li>
                <li><a href="test.html"><img src="icons/icon1.png" alt="Иконка">Тест по дисциплине</a></li>
                <li><a href="history.html"><img src="icons/icon1.png" alt="Иконка">История просмотра</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Моя автобиография</h2>
            <img src="images/photo.jpg" alt="Моя фотография" class="about-photo">
            <p>Здравствуйте! Меня зовут Дук Вячеслав Николаевич. Я родился 25 июля 1983 года в городе Севастополе.</p>
            <p>С детства я увлекался технологиями. Это привело меня к выбору профессии в области машиностроения.</p>
            <p>Я окончил СевГУ по специальности Технология Машиностроения. После окончания учебы, я начал работать в компании Таврида Электрик.</p>
            <p>За время своей карьеры я достиг следующих успехов:</p>
            <ul>
                <li>1. Освоил профессию оператора станков с ПУ.</li>
                <li>2. Освоил профессию мастера участка.</li>
                <li>3. Освоил профессию технолога.</li>
            </ul>
            <p>В свободное время я люблю читать, играть в приставку. Это помогает мне расслабиться и получить новые идеи для работы.</p>
            <p>Моя жизненная философия: Счастье приходит, когда вы перестаёте ждать, что оно придёт само, и предпринимаете шаги, чтобы оно пришло.</p>
        </section>
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

            // Отслеживание просмотра страницы
            trackPageView();
        });
    </script>
</body>
</html>