<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакт</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/myproject/public/css/styles.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <img src="/myproject/public/images/logo.png" alt="Логотип" width="50">
        <h1>Контакт</h1>
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
            <h2>Связаться со мной</h2>
            <?php
            if (isset($success_message)) echo "<p class='success-message'>$success_message</p>";
            if (isset($error_message)) echo "<div class='error-message'>$error_message</div>";
            ?>
            <form method="post" action="?page=contact">
                <label>
                    Имя:
                    <input type="text" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" placeholder="Ваше имя">
                </label>
                <label>
                    Email:
                    <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" placeholder="Ваш email">
                </label>
                <label>
                    Телефон:
                    <input type="tel" name="phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>" placeholder="+7 (999) 999-99-99">
                </label>
                <label>
                    Дата рождения:
                    <input type="date" name="birthdate" value="<?php echo isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate']) : ''; ?>">
                </label>
                <label>
                    Возраст:
                    <input type="number" name="age" min="0" max="150" value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : ''; ?>" placeholder="Ваш возраст">
                </label>
                <label>
                    Пол:
                    <input type="text" list="genders" name="gender" value="<?php echo isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : ''; ?>" placeholder="Выберите пол">
                    <datalist id="genders">
                        <option value="Мужской">
                        <option value="Женский">
                    </datalist>
                </label>
                <label>
                    Сообщение:
                    <textarea name="message" placeholder="Ваше сообщение"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                </label>
                <input type="submit" value="Отправить">
            </form>
        </section>
    </main>
    <footer>
        <p>© 2025 Мой сайт</p>
    </footer>
</body>
</html>