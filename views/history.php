<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>История просмотра</title>
    <link rel="stylesheet" href="../scss/styles.css">
</head>
<body>
    <header>
        <h1>История просмотра</h1>
        <nav>
            <ul>
                <li><a href="index.html"><img src="icons/icon1.png" alt="Иконка">Главная страница</a></li>
                <li><a href="about.html"><img src="icons/icon1.png" alt="Иконка">Обо мне</a></li>
                <li><a href="interests.html"><img src="icons/icon1.png" alt="Иконка">Мои интересы</a></li>
                <li><a href="studies.html"><img src="icons/icon1.png" alt="Иконка">Учеба</a></li>
                <li><a href="photo album.html"><img src="icons/icon1.png" alt="Иконка">Фотоальбом</a></li>
                <li><a href="contact.html"><img src="icons/icon1.png" alt="Иконка">Контакт</a></li>
                <li><a href="test.html"><img src="icons/icon1.png" alt="Иконка">Тест по дисциплине</a></li>
                <li class="active"><a href="history.html"><img src="icons/icon2.png" alt="Иконка">История просмотра</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>История просмотра</h2>

        <h3>История просмотров за всё время (Cookies)</h3>
        <table id="allTimeHistory">
            <thead>
                <tr>
                    <th>Страница</th>
                    <th>Количество посещений</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <h3>История просмотров за текущий сеанс (Local Storage)</h3>
        <table id="sessionHistory">
            <thead>
                <tr>
                    <th>Страница</th>
                    <th>Количество посещений</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/tracking.js"></script>
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

            function displayHistory() {
                const allPages = [
                    'index.html', 
                    'about.html', 
                    'interests.html', 
                    'studies.html', 
                    'photo album.html', 
                    'contact.html', 
                    'test.html', 
                    'history.html'
                ];

                const cookieHistory = JSON.parse(getCookie('allTimeHistory')) || {};
                const localHistory = JSON.parse(localStorage.getItem('sessionHistory')) || {};

                const allTimeTableBody = $('#allTimeHistory tbody');
                const sessionTableBody = $('#sessionHistory tbody');

                allPages.forEach(page => {
                    const row = $('<tr>');
                    row.append($('<td>').text(getPageName(page)));
                    row.append($('<td>').text(cookieHistory[page] || 0));
                    allTimeTableBody.append(row);
                });

                allPages.forEach(page => {
                    const row = $('<tr>');
                    row.append($('<td>').text(getPageName(page)));
                    row.append($('<td>').text(localHistory[page] || 0));
                    sessionTableBody.append(row);
                });
            }

            function getPageName(page) {
                const pageNames = {
                    'index.html': 'Главная страница',
                    'about.html': 'Обо мне',
                    'interests.html': 'Мои интересы',
                    'studies.html': 'Учеба',
                    'photo album.html': 'Фотоальбом',
                    'contact.html': 'Контакт',
                    'test.html': 'Тест по дисциплине',
                    'history.html': 'История просмотра'
                };
                return pageNames[page] || page;
            }

            // Отслеживание просмотра страницы
            trackPageView();

            // Отображение истории просмотров
            displayHistory();
        });
    </script>
</body>
</html>