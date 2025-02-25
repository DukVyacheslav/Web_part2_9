<?php
session_start();

// Автозагрузка классов
spl_autoload_register(function($className) {
    $paths = [
        __DIR__ . '/app/controllers/',
        __DIR__ . '/app/models/'
    ];
    
    foreach ($paths as $path) {
        $file = $path . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Базовый URL
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/');

// Маршрутизация
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$page = str_replace(BASE_URL, '', $request);
$page = $page ?: 'main';

// Обработка маршрутов
try {
    switch ($page) {
        case 'main':
            $controller = new MainController();
            $controller->index();
            break;
            
        case 'photo':
            $controller = new PhotoController();
            $controller->showGallery();
            break;
            
        case 'interests':
            $controller = new InterestController();
            $controller->showInterests();
            break;
            
        case 'contact':
            $controller = new ContactController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->handleForm();
            } else {
                $controller->showForm();
            }
            break;
            
        case 'test':
            $controller = new TestController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->checkTest();
            } else {
                $controller->showTest();
            }
            break;
            
        default:
            throw new Exception('Страница не найдена', 404);
    }
} catch (Exception $e) {
    // Обработка ошибок
    http_response_code($e->getCode());
    echo '<h1>Ошибка ' . $e->getCode() . '</h1>';
    echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
    exit;
}