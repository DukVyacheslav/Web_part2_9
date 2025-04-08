<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/myproject/public/css/styles.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <img src="/myproject/public/images/logo.png" alt="Логотип" width="50">
        <h1>Главная страница</h1>
        <div id="clock" style="font-size: 1.2em; font-weight: bold; display: inline-block; margin-right: 20px;"></div>
        <script>
            function updateClock() {
                const now = new Date();
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
                document.getElementById('clock').textContent = now.toLocaleDateString('ru-RU', options);
            }
            setInterval(updateClock, 1000);
            updateClock();
        </script>
        <nav>
            <a href="?page=home">Главная страница</a>
            <a href="?page=photoalbum">Фотоальбом</a>
            <a href="?page=interests">Мои интересы</a>
            <a href="?page=contact">Контакт</a>
            <a href="?page=test">Тест</a>
        </nav>
    </header>
    <main>
        <section class="card">
            <h2>Дук Вячеслав Николаевич</h2>
            <div class="photo-container">
                <img src="/myproject/public/images/photo.jpg" alt="Фото Вячеслава Николаевича" class="profile-photo">
            </div>
            <p>Это главная страница моего сайта, созданного в рамках ЛАБОРАТОРНАЯ РАБОТА №8
                «Исследование архитектуры MVC приложения и возможностей обработки
                данных HTML-форм на стороне сервера с использованием языка PHP»</p>
            <h2>Моя автобиография:</h2>
            <p>Здравствуйте! Меня зовут Дук Вячеслав Николаевич. Я родился 25 июля 1983 года в городе Севастополе.
С детства я увлекался технологиями. Это привело меня к выбору профессии в области машиностроения.
Я окончил СевГУ по специальности Технология Машиностроения. После окончания учебы, я начал работать в компании Таврида Электрик.
За время своей карьеры я достиг следующих успехов:
1. Освоил профессию оператора станков с ПУ.
2. Освоил профессию мастера участка.
3. Освоил профессию технолога.
В свободное время я люблю читать, играть в приставку. Это помогает мне расслабиться и получить новые идеи для работы.
Моя жизненная философия: Счастье приходит, когда вы перестаёте ждать, что оно придёт само, и предпринимаете шаги, чтобы оно пришло.</p>
        </section>
    </main>
    <footer>
        <p>© 2025 Мой сайт</p>
    </footer>
</body>
</html>