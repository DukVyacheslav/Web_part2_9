<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои интересы</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/myproject/public/css/styles.css?v=<?php echo time(); ?>">
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 8px;
        }
        
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        
        .dropdown-content a:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .show {
            display: block;
        }
    </style>
</head>
<body>
    <header>
        <img src="/myproject/public/images/logo.png" alt="Логотип" width="50">
        <h1>Мои интересы</h1>
        <nav>
            <a href="?page=home">Главная страница</a>
            <a href="?page=photoalbum">Фотоальбом</a>
            <div class="dropdown">
                <a href="?page=interests" class="dropbtn">Мои интересы</a>
                <div id="interestsDropdown" class="dropdown-content">
                    <?php foreach (Interest::$categories as $category => $interests): ?>
                        <a href="#<?php echo str_replace(' ', '_', $category); ?>"><?php echo htmlspecialchars($category); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <a href="?page=contact">Контакт</a>
            <a href="?page=test">Тест</a>
        </nav>
    </header>
    <main>
        <section class="card">
            <h2>Мои интересы</h2>
            <ul class="interest-list">
                <?php foreach (Interest::$categories as $category => $interests): ?>
                    <li class="category" id="<?php echo str_replace(' ', '_', $category); ?>">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropBtn = document.querySelector('.dropbtn');
            const dropdown = document.getElementById('interestsDropdown');
            
            // Показать/скрыть выпадающее меню при наведении
            dropBtn.parentElement.addEventListener('mouseenter', function() {
                dropdown.classList.add('show');
            });
            
            dropBtn.parentElement.addEventListener('mouseleave', function() {
                dropdown.classList.remove('show');
            });
            
            // Плавная прокрутка к разделам
            document.querySelectorAll('.dropdown-content a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                    dropdown.classList.remove('show');
                });
            });
        });
    </script>
</body>
</html>