<?php
require_once '../models/FormValidation.php';

$validator = new FormValidation();

// Обязательные поля
$validator->setRule('name', 'required');
$validator->setRule('email', 'required');
$validator->setRule('email', 'email');
$validator->setRule('phone', 'required');
$validator->setRule('birthdate', 'required');
$validator->setRule('age', 'required');
$validator->setRule('gender', 'required');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($validator->validate($_POST)) {
        $success_message = "Форма успешно отправлена!";
    } else {
        $error_message = "Пожалуйста, заполните все обязательные поля корректно.";
    }
}

include '../views/contact.php';
?>