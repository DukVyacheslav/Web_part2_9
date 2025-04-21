<?php
session_start();

require_once 'controllers/MainController.php';
require_once 'controllers/InterestController.php';
require_once 'controllers/PhotoController.php';
require_once 'controllers/ContactController.php';
require_once 'controllers/TestController.php';
require_once 'controllers/BlogController.php';
require_once 'controllers/GuestbookController.php';

// Определяем контроллер
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'main';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Создаем экземпляр соответствующего контроллера
switch ($controller) {
    case 'main':
        $controller = new MainController();
        break;
    case 'interests':
        $controller = new InterestController();
        break;
    case 'photo':
        $controller = new PhotoController();
        break;
    case 'contact':
        $controller = new ContactController();
        break;
    case 'test':
        $controller = new TestController();
        break;
    case 'blog':
        $controller = new BlogController();
        break;
    case 'guestbook':
        $controller = new GuestbookController();
        break;
    default:
        header('HTTP/1.1 404 Not Found');
        echo 'Страница не найдена';
        exit;
}

// Вызываем соответствующий метод контроллера
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    header('HTTP/1.1 404 Not Found');
    echo 'Действие не найдено';
    exit;
}
?>