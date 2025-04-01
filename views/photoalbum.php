<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фотоальбом</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/myproject/public/css/styles.css?v=<?php echo time(); ?>">
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
        <section class="card">
            <h2>Мои фотографии</h2>
            <p>Здесь собраны мои лучшие моменты. Наслаждайтесь просмотром!</p>
            <div class="photo-grid">
                <?php
                for ($i = 1; $i <= 15; $i++) {
                    $file = "photo{$i}.jpg";
                    $caption = "Фото №{$i}";
                    ?>
                    <div class="photo-item-container">
                        <img src="/myproject/public/images/<?php echo htmlspecialchars($file); ?>" alt="<?php echo htmlspecialchars($caption); ?>" class="photo-item" data-index="<?php echo $i - 1; ?>">
                        <p class="photo-caption"><?php echo htmlspecialchars($caption); ?></p>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>
    <footer>
        <p>© 2025 Мой сайт</p>
    </footer>

    <!-- Модальное окно -->
    <div id="lightbox" class="lightbox">
        <span id="close-lightbox" class="close">×</span>
        <div class="lightbox-content">
            <img id="lightbox-image" src="" alt="Увеличенное фото">
        </div>
        <p id="lightbox-caption"></p>
    </div>

    <script src="/myproject/public/js/script.js?v=<?php echo time(); ?>"></script>
</body>
</html>