<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест по дисциплине</title>
    <link rel="stylesheet" href="../scss/styles.css">
</head>
<body>
    <header>
        <h1>Тест по дисциплине</h1>
        <nav>
            <ul>
                <li><a href="index.html"><img src="icons/icon1.png" alt="Иконка">Главная страница</a></li>
                <li><a href="about.html"><img src="icons/icon1.png" alt="Иконка">Обо мне</a></li>
                <li><a href="interests.html"><img src="icons/icon1.png" alt="Иконка">Мои интересы</a></li>
                <li><a href="studies.html"><img src="icons/icon1.png" alt="Иконка">Учеба</a></li>
                <li><a href="photo album.html"><img src="icons/icon1.png" alt="Иконка">Фотоальбом</a></li>
                <li><a href="contact.html"><img src="icons/icon1.png" alt="Иконка">Контакт</a></li>
                <li class="active"><a href="test.html"><img src="icons/icon2.png" alt="Иконка">Тест по дисциплине</a></li>
                <li><a href="history.html"><img src="icons/icon1.png" alt="Иконка">История просмотра</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Тест по дисциплине</h2>
        <form id="testForm">
            <label for="name">Фамилия Имя Отчество:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="group">Группа:</label>
            <select id="group" name="group">
                <option value="1">1 группа</option>
                <option value="2">2 группа</option>
                <option value="3">3 группа</option>
            </select><br><br>
            <label for="question1">Вопрос 1:</label>
            <input type="radio" id="question1-1" name="question1" value="1">
            <label for="question1-1">Вариант 1</label>
            <input type="radio" id="question1-2" name="question1" value="2">
            <label for="question1-2">Вариант 2</label>
            <input type="radio" id="question1-3" name="question1" value="3">
            <label for="question1-3">Вариант 3</label><br><br>
            <label for="question2">Вопрос 2:</label>
            <select id="question2" name="question2">
                <option value="1">Вариант 1</option>
                <option value="2">Вариант 2</option>
                <option value="3">Вариант 3</option>
                <option value="4">Вариант 4</option>
                <option value="5">Вариант 5</option>
            </select><br><br>
            <label for="question3">Вопрос 3:</label>
            <textarea id="question3" name="question3"></textarea><br><br>
            <input type="submit" value="Отправить">
            <input type="reset" value="Очистить форму">
        </form>
        <div id="errorMessage" style="color: red; display: none;"></div>
    </main>

    <!-- Модальное окно -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <p>Вы уверены, что хотите отправить форму?</p>
            <button class="yes">Да</button>
            <button class="no">Нет</button>
        </div>
    </div>

    <!-- Всплывающее сообщение -->
    <div id="successMessage" class="success-message">
        <p>Форма успешно отправлена!</p>
    </div>

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

            // Обработка отправки формы
            $('#testForm').submit(function(event) {
                event.preventDefault();
                const name = $('#name').val();
                const group = $('#group').val();
                const question1 = $('input[name="question1"]:checked').val();
                const question2 = $('#question2').val();
                const question3 = $('#question3').val();
                let isValid = true;

                // Проверка на заполненность полей
                if (!name || !group || !question1 || !question2 || !question3) {
                    $('#errorMessage').text('Пожалуйста, заполните все поля формы.').show();
                    if (!name) {
                        $('#name').focus();
                        isValid = false;
                    } else if (!group) {
                        $('#group').focus();
                        isValid = false;
                    } else if (!question1) {
                        $('input[name="question1"]').focus();
                        isValid = false;
                    } else if (!question2) {
                        $('#question2').focus();
                        isValid = false;
                    } else if (!question3) {
                        $('#question3').focus();
                        isValid = false;
                    }
                }

                // Проверка количества слов в ответе на вопрос 3
                if (isValid) {
                    const wordCount = question3.trim().split(/\s+/).length;
                    if (wordCount < 20) {
                        $('#errorMessage').text('Ответ на вопрос №3 должен содержать не менее 20 слов.').show();
                        $('#question3').focus();
                        isValid = false;
                    }
                }

                if (isValid) {
                    $('#errorMessage').hide();
                    // Показываем модальное окно
                    showConfirmationModal();
                }
            });

            // Функция для создания и отображения Popover
            function showPopover(element, message) {
                // Создаем Popover
                let popover = $('<div class="popover"></div>').text(message);
                $('body').append(popover);

                // Определяем позицию Popover
                let offset = element.offset();
                popover.css({
                    top: offset.top + element.outerHeight(),
                    left: offset.left
                });

                // Показываем Popover
                popover.fadeIn(200);

                // Скрываем Popover через 1 секунду после ухода мыши
                element.on('mouseleave', function() {
                    setTimeout(function() {
                        popover.fadeOut(200, function() {
                            popover.remove();
                        });
                    }, 1000);
                });
            }

            // Привязываем Popover к полям формы
            $('#name').on('mouseenter', function() {
                showPopover($(this), 'Введите ваши Фамилию, Имя и Отчество.');
            });

            $('#group').on('mouseenter', function() {
                showPopover($(this), 'Выберите вашу группу.');
            });

            $('input[name="question1"]').on('mouseenter', function() {
                showPopover($(this), 'Выберите один из вариантов ответа.');
            });

            $('#question2').on('mouseenter', function() {
                showPopover($(this), 'Выберите один из вариантов ответа.');
            });

            $('#question3').on('mouseenter', function() {
                showPopover($(this), 'Ответ должен содержать не менее 20 слов.');
            });

            // Отслеживание просмотра страницы
            trackPageView();

            // Функция для отображения модального окна
            function showConfirmationModal() {
                // Создаем размытый фон
                let blurBackground = $('<div class="blur-background"></div>').css({
                    position: 'fixed',
                    top: 0,
                    left: 0,
                    width: '100%',
                    height: '100%',
                    zIndex: 1000
                });
                $('body').append(blurBackground);

                // Показываем модальное окно
                $('#confirmationModal').fadeIn(200);

                // Обработка нажатия кнопок в модальном окне
                $('#confirmationModal .yes').click(function() {
                    $('#confirmationModal').fadeOut(200);
                    blurBackground.remove();
                    // Отправка формы
                    $('#testForm').off('submit').submit();
                    // Показываем всплывающее сообщение
                    $('#successMessage').fadeIn(200).delay(2000).fadeOut(200);
                });

                $('#confirmationModal .no').click(function() {
                    $('#confirmationModal').fadeOut(200);
                    blurBackground.remove();
                });
            }
        });
    </script>
</body>
</html>