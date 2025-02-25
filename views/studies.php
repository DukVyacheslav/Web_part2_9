<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Учеба</title>
    <link rel="stylesheet" href="../scss/styles.css">
</head>
<body>
    <header>
        <h1>Учёба</h1>
        <nav>
            <ul>
                <!-- Обработчики событий добавляем только для неактивных пунктов -->
                <li><a href="index.html"><img src="icons/icon1.png" alt="Иконка">Главная страница</a></li>
                <li><a href="about.html"><img src="icons/icon1.png" alt="Иконка">Обо мне</a></li>
                <li><a href="interests.html"><img src="icons/icon1.png" alt="Иконка">Мои интересы</a></li>
                <li><a href="studies.html" class="active"><img src="icons/icon2.png" alt="Иконка">Учеба</a></li>
                <li><a href="photo album.html"><img src="icons/icon1.png" alt="Иконка">Фотоальбом</a></li>
                <li><a href="contact.html"><img src="icons/icon1.png" alt="Иконка">Контакт</a></li>
                <li><a href="test.html"><img src="icons/icon1.png" alt="Иконка">Тест по дисциплине</a></li>
                <li><a href="history.html"><img src="icons/icon1.png" alt="Иконка">История просмотра</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Учёба</h2>
        <p>Полное название университета: Севастопольский Государственный Университет</p>
        <p>Полное название кафедры: Информационные Системы</p>
        <table>
            <tr>
                <th>№</th>
                <th>Дисциплина</th>
                <th>Кафедра</th>
                <th>Всего часов</th>
                <th>Всего ауд</th>
                <th>Лк</th>
                <th>Лб</th>
                <th>Пр</th>
                <th>СРС</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Экология</td>
                <td>БЖ</td>
                <td>54</td>
                <td>27</td>
                <td>18</td>
                <td>0</td>
                <td>9</td>
                <td>27</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Высшая математика</td>
                <td>ВМ</td>
                <td>540</td>
                <td>282</td>
                <td>141</td>
                <td>0</td>
                <td>141</td>
                <td>258</td>
            </tr>
            <!-- Добавьте еще строки таблицы -->
        </table>

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
    </main>
</body>
</html>