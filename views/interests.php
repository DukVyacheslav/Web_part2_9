<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мои интересы</title>
    <link rel="stylesheet" href="/myproject/public/css/styles.css">
</head>
<body>
    <header>
        <img src="/myproject/public/images/logo.png" alt="Логотип" width="50">
        <h1>Мои интересы</h1>
        <nav>
            <a href="?page=home">Главная страница</a>
            <a href="?page=photoalbum">Фотоальбом</a>
            <a href="?page=interests">Мои интересы</a>
            <a href="?page=contact">Контакт</a>
            <a href="?page=test">Тест</a>
        </nav>
    </header>
    <main>
        <h2>Мои интересы</h2>
        <ul>
            <?php foreach (Interest::$categories as $category => $interests): ?>
                <li class="category"><?php echo $category; ?>
                    <ul>
                        <?php foreach ($interests as $interest): ?>
                            <li>
                                <span class="subcategory"><?php echo $interest; ?></span> - 
                                <span class="description"><?php echo Interest::$descriptions[$interest]; ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
    <footer>
        <p>© 2025 Мой сайт</p>
    </footer>
</body>
</html>