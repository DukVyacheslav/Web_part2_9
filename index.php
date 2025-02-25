<?php
// Определяем запрашиваемую страницу
$page = $_GET['page'] ?? 'main';

// Маппинг страниц на контроллеры
$routes = [
    'main' => 'MainController',
    'photo' => 'PhotoController',
    'interests' => 'InterestController',
    'test' => 'TestController',
    'contact' => 'ContactController'
];

// Подключаем контроллер
if (isset($routes[$page])) {
    require_once "controllers/{$routes[$page]}.php";
} else {
    header("HTTP/1.0 404 Not Found");
    exit('Страница не найдена');
}