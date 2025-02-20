<?php
class Photo {
    // Данные храним в константе, как требует задание
    const PHOTOS = [
        ['file' => 'nature.jpg', 'caption' => 'Красивый закат'],
        ['file' => 'city.jpg', 'caption' => 'Ночной город']
    ];

    public static function getAll() {
        return self::PHOTOS;
    }
}
?>