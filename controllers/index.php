<?php
require_once 'Model/Interest.php';
require_once 'Model/Photo.php';
require_once 'Model/FormValidation.php';
require_once 'Model/ResultsVerification.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Обработка формы "Контакт"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $page === 'contact') {
    $validator = new FormValidation();
    $validator->setRule('name', 'notEmpty');
    $validator->setRule('email', 'email');
    $validator->setRule('message', 'notEmpty');

    if ($validator->validate($_POST)) {
        $success_message = "Форма успешно отправлена!";
    } else {
        $error_message = $validator->showErrors();
    }
}

// Обработка формы "Тест"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $page === 'test') {
    $validator = new ResultsVerification();
    $validator->setRule('question1', 'notEmpty');
    $validator->setRule('question2', 'notEmpty');
    $validator->setRule('question3', 'notEmpty');

    if ($validator->validate($_POST)) {
        $test_result = $validator->showResults();
    } else {
        $test_errors = $validator->showErrors();
        $test_result = $validator->showResults();
    }
}

// Маршрутизация страниц
switch ($page) {
    case 'photoalbum':
        include 'View/photoalbum.php';
        break;
    case 'interests':
        include 'View/interests.php';
        break;
    case 'contact':
        include 'View/contact.php';
        break;
    case 'test':
        include 'View/test.php';
        break;
    default:
        include 'View/home.php';
}
?>