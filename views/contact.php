<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Контакт</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 400px; }
        label { display: block; margin: 10px 0; }
        input[type="text"], input[type="email"], textarea { width: 100%; padding: 5px; }
        input[type="submit"] { margin-top: 10px; padding: 5px 10px; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Контакт</h2>
    <nav>
        <a href="?page=home">Главная</a> |
        <a href="?page=photoalbum">Фотоальбом</a> |
        <a href="?page=interests">Мои интересы</a> |
        <a href="?page=contact">Контакт</a> |
        <a href="?page=test">Тест</a>
    </nav>

    <?php
    if (isset($success_message)) echo "<p class='success'>$success_message</p>";
    if (isset($error_message)) echo "<div class='error'>$error_message</div>";
    ?>

    <form method="post" action="?page=contact">
        <label>Имя: <input type="text" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"></label><br>
        <label>Email: <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"></label><br>
        <label>Сообщение: <textarea name="message"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea></label><br>
        <input type="submit" value="Отправить">
    </form>
</body>
</html>