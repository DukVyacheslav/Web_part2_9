<?php
require_once '../models/Photo.php';

// Получаем данные из модели
$photos = Photo::getAll();

// Подключаем представление
include '../views/photo.php';
?>