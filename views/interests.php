<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мои интересы</title>
</head>
<body>
    <h2>Мои интересы</h2>
    <nav>
        <a href="?page=home">Главная</a> |
        <a href="?page=photoalbum">Фотоальбом</a> |
        <a href="?page=interests">Мои интересы</a> |
        <a href="?page=contact">Контакт</a> |
        <a href="?page=test">Тест</a>
    </nav>
    <ul>
        <?php foreach (Interest::$categories as $category => $interests): ?>
            <li><?php echo $category; ?>
                <ul>
                    <?php foreach ($interests as $interest): ?>
                        <li><?php echo $interest; ?> - <?php echo Interest::$descriptions[$interest]; ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>