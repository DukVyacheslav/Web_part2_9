<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест по дисциплине</title>
    <link rel="stylesheet" href="/myproject/public/css/styles.css">
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
        <h2>Тест по дисциплине</h2>
        <?php
        if (isset($test_errors)) echo "<div class='error'>$test_errors</div>";
        if (isset($test_result)) echo "<p class='success'>$test_result</p>";
        ?>
        <form method="post" action="?page=test">
            <p>Вопрос 1: 2 + 2?</p>
            <label><input type="radio" name="question1" value="4" <?php echo (isset($_POST['question1']) && $_POST['question1'] === '4') ? 'checked' : ''; ?>> 4</label>
            <label><input type="radio" name="question1" value="5" <?php echo (isset($_POST['question1']) && $_POST['question1'] === '5') ? 'checked' : ''; ?>> 5</label>

            <p>Вопрос 2: Столица России?</p>
            <select name="question2">
                <option value="moscow" <?php echo (isset($_POST['question2']) && $_POST['question2'] === 'moscow') ? 'selected' : ''; ?>>Москва</option>
                <option value="petersburg" <?php echo (isset($_POST['question2']) && $_POST['question2'] === 'petersburg') ? 'selected' : ''; ?>>Петербург</option>
            </select>

            <p>Вопрос 3: 5 * 5?</p>
            <input type="text" name="question3" value="<?php echo isset($_POST['question3']) ? htmlspecialchars($_POST['question3']) : ''; ?>">

            <input type="submit" value="Проверить">
        </form>
    </main>
    <footer>
        <p>© 2025 Мой сайт</p>
    </footer>
</body>
</html>