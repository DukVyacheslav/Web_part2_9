<?php
require_once '../models/FormValidation.php';

$validator = new FormValidation();
$validator->setRule('email', 'required');
$validator->setRule('email', 'email');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($validator->validate($_POST)) {
        // Отправляем письмо или сохраняем данные
        echo "Форма успешно отправлена!";
    } else {
        // Показываем ошибки
        $validator->showErrors();
    }
}

include '../views/contact.php';
?>