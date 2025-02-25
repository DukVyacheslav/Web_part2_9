<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фотоальбом</title>
    <link rel="stylesheet" href="../scss/styles.css">
</head>
<body>
    <header>
        <h1>Фотоальбом</h1>
        <nav>
            <ul>
                <li><a href="index.html"><img src="icons/icon1.png" alt="Иконка">Главная страница</a></li>
                <li><a href="about.html"><img src="icons/icon1.png" alt="Иконка">Обо мне</a></li>
                <li><a href="interests.html"><img src="icons/icon1.png" alt="Иконка">Мои интересы</a></li>
                <li><a href="studies.html"><img src="icons/icon1.png" alt="Иконка">Учеба</a></li>
                <li><a href="photo album.html" class="active"><img src="icons/icon2.png" alt="Иконка">Фотоальбом</a></li>
                <li><a href="contact.html"><img src="icons/icon1.png" alt="Иконка">Контакт</a></li>
                <li><a href="test.html"><img src="icons/icon1.png" alt="Иконка">Тест по дисциплине</a></li>
                <li><a href="history.html"><img src="icons/icon1.png" alt="Иконка">История просмотра</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Фотоальбом</h2>
        <!-- Таблица с фото будет добавлена здесь -->
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/tracking.js"></script>
    <script>
        $(document).ready(function() {
            // Массивы с именами файлов фото и подписями
            const fotos = [
                "images/cat.jpg", "images/cat.jpg", "images/cat.jpg", "images/cat.jpg", "images/cat.jpg",
                "images/cat.jpg", "images/cat.jpg", "images/cat.jpg", "images/cat.jpg", "images/cat.jpg",
                "images/cat.jpg", "images/cat.jpg", "images/cat.jpg", "images/cat.jpg", "images/cat.jpg"
            ];
            
            const titles = [
                "Фото 1", "Фото 2", "Фото 3", "Фото 4", "Фото 5",
                "Фото 6", "Фото 7", "Фото 8", "Фото 9", "Фото 10",
                "Фото 11", "Фото 12", "Фото 13", "Фото 14", "Фото 15"
            ];

            let currentIndex = 0;

            // Функция для генерации таблицы с фото
            function generatePhotoTable() {
                const table = $('<table>').addClass('photo-table');
                let row;

                for (let i = 0; i < fotos.length; i++) {
                    // Создаем новую строку после каждых 5 фотографий
                    if (i % 5 === 0) {
                        row = $('<tr>');
                        table.append(row);
                    }

                    const cell = $('<td>');
                    const figure = $('<figure>');
                    const img = $('<img>').attr({
                        src: fotos[i],
                        alt: titles[i],
                        title: titles[i],
                        width: 200,
                        height: 200
                    }).on('click', function() {
                        currentIndex = i;
                        openModal(fotos[i], titles[i]);
                    });

                    const figcaption = $('<figcaption>').text(titles[i]);

                    figure.append(img).append(figcaption);
                    cell.append(figure);
                    row.append(cell);
                }

                $('main').append(table);
            }

            // Функция для открытия модального окна с большим фото
            function openModal(imageSrc, captionText) {
                const modal = $('<div>').addClass('photo-modal').css('display', 'block');
                const modalContent = $('<div>').addClass('photo-modal-content');
                const img = $('<img>').attr('src', imageSrc).attr('alt', captionText);
                const caption = $('<div>').addClass('photo-modal-caption').text(captionText);
                const closeBtn = $('<span>').addClass('close').html('&times;').on('click', function() {
                    closeModal(modal);
                });

                const arrowLeft = $('<span>').addClass('arrow arrow-left').html('&#10094;').on('click', function() {
                    changeImage(-1);
                });
                const arrowRight = $('<span>').addClass('arrow arrow-right').html('&#10095;').on('click', function() {
                    changeImage(1);
                });

                modalContent.append(img).append(caption).append(closeBtn).append(arrowLeft).append(arrowRight);
                modal.append(modalContent);
                $('body').append(modal);
            }

            // Функция для закрытия модального окна
            function closeModal(modal) {
                modal.css('display', 'none');
                modal.remove();
            }

            // Функция для смены изображения
            function changeImage(direction) {
                currentIndex += direction;
                if (currentIndex < 0) {
                    currentIndex = fotos.length - 1;
                } else if (currentIndex >= fotos.length) {
                    currentIndex = 0;
                }

                const modalContent = $('.photo-modal-content');
                const img = modalContent.find('img');
                const caption = modalContent.find('.photo-modal-caption');

                img.fadeOut(300, function() {
                    img.attr('src', fotos[currentIndex]).attr('alt', titles[currentIndex]).fadeIn(300);
                    caption.text(titles[currentIndex]);
                });
            }

            // Запускаем функции при загрузке страницы
            generatePhotoTable();
            trackPageView();

            // Функция изменения иконки при наведении мыши
            $('nav ul li').not('.active').hover(
                function() {
                    $(this).find('img').attr('src', 'icons/icon2.png');
                },
                function() {
                    $(this).find('img').attr('src', 'icons/icon1.png');
                }
            );
        });
    </script>
</body>
</html>