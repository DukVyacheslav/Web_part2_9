<?php
// Простейший роутер
$page = $_GET['page'] ?? 'main';

switch ($page) {
    case 'photo':
        require 'controllers/PhotoController.php';
        break;
    case 'interests':
        require 'controllers/InterestController.php';
        break;
    default:
        require 'controllers/MainController.php';
}
?>