<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест по дисциплине</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/myproject/public/css/styles.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <img src="/myproject/public/images/logo.png" alt="Логотип" width="50">
        <h1>Тест по дисциплине</h1>
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
            <h2>Тест по дисциплине</h2>
            <?php
            if (isset($test_errors)) echo "<div class='error-message'>$test_errors</div>";
            if (isset($test_result)) echo "<div class='success-message'>$test_result</div>";
            ?>
            <form method="post" action="?page=test">
                <label>
                    Фамилия Имя Отчество:
                    <input type="text" name="fullName" value="<?php echo isset($_POST['fullName']) ? htmlspecialchars($_POST['fullName']) : ''; ?>" placeholder="Введите ФИО полностью">
                </label>

                <label>
                    Группа:
                    <input type="text" list="groups" name="group" value="<?php echo isset($_POST['group']) ? htmlspecialchars($_POST['group']) : ''; ?>" placeholder="Выберите группу">
                    <datalist id="groups">
                        <option value="Группа1">
                        <option value="Группа2">
                        <option value="Группа3">
                    </datalist>
                </label>

                <label>
                    Вопрос 1:
                    <input type="text" readonly value="Выберите один вариант ответа:" style="background: none; border: none; padding: 0;">
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="question1" value="variant1" <?php echo (isset($_POST['question1']) && $_POST['question1'] === 'variant1') ? 'checked' : ''; ?>>
                            Вариант1
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="question1" value="variant2" <?php echo (isset($_POST['question1']) && $_POST['question1'] === 'variant2') ? 'checked' : ''; ?>>
                            Вариант2
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="question1" value="variant3" <?php echo (isset($_POST['question1']) && $_POST['question1'] === 'variant3') ? 'checked' : ''; ?>>
                            Вариант3
                        </label>
                    </div>
                </label>

                <label>
                    Вопрос 2:
                    <input type="text" list="answers2" name="question2" value="<?php echo isset($_POST['question2']) ? htmlspecialchars($_POST['question2']) : ''; ?>" placeholder="Выберите вариант ответа">
                    <datalist id="answers2">
                        <option value="Вариант 1">
                        <option value="Вариант 2">
                        <option value="Вариант 3">
                        <option value="Вариант 4">
                        <option value="Вариант 5">
                    </datalist>
                </label>

                <label>
                    Вопрос 3:
                    <input type="text" name="question3" value="<?php echo isset($_POST['question3']) ? htmlspecialchars($_POST['question3']) : ''; ?>" placeholder="Введите ваш ответ">
                </label>

                <div class="button-group">
                    <input type="reset" value="Очистить форму" class="secondary-button">
                    <input type="submit" value="Отправить форму">
                </div>
            </form>
        </section>
    </main>
    <footer>
        <p>© 2025 Мой сайт</p>
    </footer>
</body>
</html>