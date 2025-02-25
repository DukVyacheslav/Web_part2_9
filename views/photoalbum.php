<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Фотоальбом</title>
</head>
<body>
    <h2>Фотоальбом</h2>
    <nav>
        <a href="?page=home">Главная</a> |
        <a href="?page=photoalbum">Фотоальбом</a> |
        <a href="?page=interests">Мои интересы</a> |
        <a href="?page=contact">Контакт</a> |
        <a href="?page=test">Тест</a>
    </nav>
    <table>
        <tr>
            <?php foreach (Photo::$photos as $photo): ?>
                <td>
                    <img src="images/<?php echo $photo['file']; ?>" alt="<?php echo $photo['caption']; ?>" width="200">
                    <p><?php echo $photo['caption']; ?></p>
                </td>
            <?php endforeach; ?>
        </tr>
    </table>
</body>
</html>