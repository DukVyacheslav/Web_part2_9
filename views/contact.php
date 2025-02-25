<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакт</title>
    <link rel="stylesheet" href="../scss/styles.css">
</head>
<body>
    <header>
        <h1>Контакт</h1>
        <nav>
            <ul>
                <li><a href="index.html"><img src="icons/icon1.png" alt="Иконка">Главная страница</a></li>
                <li><a href="about.html"><img src="icons/icon1.png" alt="Иконка">Обо мне</a></li>
                <li><a href="interests.html"><img src="icons/icon1.png" alt="Иконка">Мои интересы</a></li>
                <li><a href="studies.html"><img src="icons/icon1.png" alt="Иконка">Учеба</a></li>
                <li><a href="photo album.html"><img src="icons/icon1.png" alt="Иконка">Фотоальбом</a></li>
                <li><a href="contact.html" class="active"><img src="icons/icon2.png" alt="Иконка">Контакт</a></li>
                <li><a href="test.html"><img src="icons/icon1.png" alt="Иконка">Тест по дисциплине</a></li>
                <li><a href="history.html"><img src="icons/icon1.png" alt="Иконка">История просмотра</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Контактные данные</h1>
        <form id="contactForm">
            <label for="name">Фамилия Имя Отчество:</label>
            <input type="text" id="name" name="name"><br>
            <div id="nameError" class="error-message"></div>

            <label for="birthdate">Дата рождения:</label>
            <div class="calendar-container">
                <input type="text" id="birthdate" name="birthdate" readonly>
                <div id="calendar" class="calendar" style="display: none;">
                    <div class="calendar-header">
                        <select id="calendar-month">
                            <option value="0">Январь</option>
                            <option value="1">Февраль</option>
                            <option value="2">Март</option>
                            <option value="3">Апрель</option>
                            <option value="4">Май</option>
                            <option value="5">Июнь</option>
                            <option value="6">Июль</option>
                            <option value="7">Август</option>
                            <option value="8">Сентябрь</option>
                            <option value="9">Октябрь</option>
                            <option value="10">Ноябрь</option>
                            <option value="11">Декабрь</option>
                        </select>
                        <select id="calendar-year">
                            <script>
                                const currentYear = new Date().getFullYear();
                                for (let i = currentYear; i >= currentYear - 100; i--) {
                                    document.write(`<option value="${i}">${i}</option>`);
                                }
                            </script>
                        </select>
                    </div>
                    <div class="calendar-days">
                        <!-- Дни месяца будут генерироваться с помощью JavaScript -->
                    </div>
                </div>
            </div><br>
            <div id="birthdateError" class="error-message"></div>

            <label for="phone">Телефон:</label>
            <input type="text" id="phone" name="phone"><br>
            <div id="phoneError" class="error-message"></div>

            <label for="gender">Пол:</label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Мужской</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Женский</label><br>
            <div id="genderError" class="error-message"></div>

            <label for="age">Возраст:</label>
            <select id="age" name="age">
                <option value="18-24">18-24</option>
                <option value="25-34">25-34</option>
                <option value="35-44">35-44</option>
                <option value="45-54">45-54</option>
                <option value="55-64">55-64</option>
                <option value="65+">65+</option>
            </select><br>
            <div id="ageError" class="error-message"></div>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email"><br>
            <div id="emailError" class="error-message"></div>

            <input type="submit" value="Отправить" id="submitBtn" disabled>
            <input type="reset" value="Очистить форму">
        </form>
        <div id="successMessage" class="success-message"></div>
        <div id="errorMessage" style="color: red; display: none;"></div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/tracking.js"></script>
    <script>
        $(document).ready(function() {
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

            $('#phone').on('mouseenter', function() {
                showPopover($(this), 'Введите номер телефона в формате "+7XXXXXXXXXX".');
            });

            $('input[name="gender"]').on('mouseenter', function() {
                showPopover($(this), 'Выберите ваш пол.');
            });

            $('#age').on('mouseenter', function() {
                showPopover($(this), 'Выберите ваш возраст.');
            });

            $('#email').on('mouseenter', function() {
                showPopover($(this), 'Введите ваш email в формате "example@domain.com".');
            });

            $('#birthdate').on('mouseenter', function() {
                showPopover($(this), 'Выберите вашу дату рождения.');
            });

            // Функция изменения иконки при наведении мыши
            $('nav ul li').not('.active').hover(
                function() {
                    $(this).find('img').attr('src', 'icons/icon2.png');
                },
                function() {
                    $(this).find('img').attr('src', 'icons/icon1.png');
                }
            );

            // Функция для валидации имени
            $('#name').blur(function() {
                const input = $(this);
                const errorDiv = $('#nameError');
                if (!/^[A-Za-zА-Яа-я\s]+$/.test(input.val()) || input.val().trim().split(/\s+/).length !== 3) {
                    input.addClass('error').removeClass('valid');
                    errorDiv.text('Неверный формат поля "Фамилия Имя Отчество". Введите три слова, разделенные пробелами.').show();
                } else {
                    input.addClass('valid').removeClass('error');
                    errorDiv.hide();
                }
                checkFormValidity();
            });

            // Функция для валидации телефона
            $('#phone').blur(function() {
                const input = $(this);
                const errorDiv = $('#phoneError');
                if (!/^\+7\d{10}$/.test(input.val())) {
                    input.addClass('error').removeClass('valid');
                    errorDiv.text('Неверный формат поля "Телефон". Введите номер в формате "+7XXXXXXXXXX".').show();
                } else {
                    input.addClass('valid').removeClass('error');
                    errorDiv.hide();
                }
                checkFormValidity();
            });

            // Функция для валидации пола
            $('input[name="gender"]').blur(function() {
                const input = $(this);
                const errorDiv = $('#genderError');
                if (!$('input[name="gender"]:checked').length) {
                    input.addClass('error').removeClass('valid');
                    errorDiv.text('Пожалуйста, выберите пол.').show();
                } else {
                    input.addClass('valid').removeClass('error');
                    errorDiv.hide();
                }
                checkFormValidity();
            });

            // Функция для валидации возраста
            $('#age').blur(function() {
                const input = $(this);
                const errorDiv = $('#ageError');
                if (!input.val()) {
                    input.addClass('error').removeClass('valid');
                    errorDiv.text('Пожалуйста, выберите возраст.').show();
                } else {
                    input.addClass('valid').removeClass('error');
                    errorDiv.hide();
                }
                checkFormValidity();
            });

            // Функция для валидации email
            $('#email').blur(function() {
                const input = $(this);
                const errorDiv = $('#emailError');
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.val())) {
                    input.addClass('error').removeClass('valid');
                    errorDiv.text('Неверный формат поля "E-mail". Введите корректный адрес электронной почты.').show();
                } else {
                    input.addClass('valid').removeClass('error');
                    errorDiv.hide();
                }
                checkFormValidity();
            });

            // Функция для проверки валидности формы
            function checkFormValidity() {
                const inputs = $('#contactForm input, #contactForm select');
                let isValid = true;
                inputs.each(function() {
                    if ($(this).hasClass('error')) {
                        isValid = false;
                    }
                });
                $('#submitBtn').prop('disabled', !isValid);
            }

            // Функция для переключения календаря
            $('#birthdate').click(function() {
                const calendar = $('#calendar');
                calendar.toggle();
                updateCalendar(); // Обновляем календарь при открытии
            });

            // Функция для обновления календаря
            function updateCalendar() {
                const month = $('#calendar-month').val();
                const year = $('#calendar-year').val();
                const daysContainer = $('.calendar-days');
                daysContainer.empty(); // Очищаем предыдущие дни
                const daysInMonth = new Date(year, parseInt(month) + 1, 0).getDate();
                for (let day = 1; day <= daysInMonth; day++) {
                    const dayDiv = $('<div>').text(day).click(function() {
                        $('#birthdate').val(`${day}/${parseInt(month) + 1}/${year}`);
                        $('#calendar').hide(); // Закрываем календарь
                        validateBirthdate($('#birthdate'));
                    });
                    daysContainer.append(dayDiv);
                }
            }

            // Функция для валидации даты рождения
            function validateBirthdate(input) {
                const errorDiv = $('#birthdateError');
                if (!input.val()) {
                    input.addClass('error').removeClass('valid');
                    errorDiv.text('Пожалуйста, введите дату рождения.').show();
                } else {
                    input.addClass('valid').removeClass('error');
                    errorDiv.hide();
                }
                checkFormValidity();
            }

            // Закрытие календаря при клике вне его
            $(window).click(function(event) {
                const calendar = $('#calendar');
                if (!$(event.target).is('#birthdate') && !calendar.has(event.target).length) {
                    calendar.hide();
                }
            });

            // Обработка отправки формы
            $('#contactForm').submit(function(event) {
                event.preventDefault();
                const name = $('#name').val();
                const phone = $('#phone').val();
                const gender = $('input[name="gender"]:checked').val();
                const age = $('#age').val();
                const email = $('#email').val();
                const birthdate = $('#birthdate').val();

                let isValid = true;

                if (!birthdate) {
                    isValid = false;
                    $('#birthdate').addClass('error');
                    $('#birthdateError').text('Пожалуйста, введите дату рождения.').show();
                } else {
                    $('#birthdate').removeClass('error');
                    $('#birthdateError').hide();
                }

                if (isValid) {
                    $('#successMessage').text('Форма успешно отправлена!').show();
                    $('#errorMessage').hide();
                    alert('Форма успешно отправлена!');
                } else {
                    $('#errorMessage').text('Пожалуйста, исправьте ошибки в форме.').show();
                    $('#successMessage').hide();
                }
            });

            // Отслеживание просмотра страницы
            trackPageView();
        });
    </script>
</body>
</html>