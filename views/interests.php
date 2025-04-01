<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои интересы</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/myproject/public/css/styles.css?v=<?php echo time(); ?>">
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
        <section class="card">
            <h2>Мои интересы</h2>
            <ul class="interest-list">
                <?php foreach (Interest::$categories as $category => $interests): ?>
                    <li class="category">
                        <h3><?php echo htmlspecialchars($category); ?></h3>
                        <ul class="subcategory-list">
                            <?php foreach ($interests as $interest): ?>
                                <li>
                                    <span class="subcategory"><?php echo htmlspecialchars($interest); ?></span> - 
                                    <span class="description"><?php echo htmlspecialchars(Interest::$descriptions[$interest]); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>
    <footer>
        <p>© 2025 Мой сайт</p>
    </footer>
</body>
</html>