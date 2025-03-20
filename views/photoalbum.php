<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Фотоальбом</title>
    <link rel="stylesheet" href="/myproject/public/css/styles.css">
</head>
<body>
    <header>
        <img src="/myproject/public/images/logo.png" alt="Логотип" width="50">
        <h1>Фотоальбом</h1>
        <nav>
            <a href="?page=home">Главная страница</a>
            <a href="?page=photoalbum">Фотоальбом</a>
            <a href="?page=interests">Мои интересы</a>
            <a href="?page=contact">Контакт</a>
            <a href="?page=test">Тест</a>
        </nav>
    </header>
    <main>
        <h2>Фотоальбом</h2>
        <table>
            <tr>
                <?php foreach (Photo::$photos as $photo): ?>
                    <td>
                        <img src="/myproject/public/images/<?php echo $photo['file']; ?>" alt="<?php echo $photo['caption']; ?>" width="200">
                        <p><?php echo $photo['caption']; ?></p>
                    </td>
                <?php endforeach; ?>
            </tr>
        </table>
    </main>
    <footer>
        <p>© 2025 Мой сайт</p>
    </footer>
</body>
</html>