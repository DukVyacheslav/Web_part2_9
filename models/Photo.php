<?php
class Photo {
    const PHOTO_DATA = [
        ['file' => 'photo1.jpg', 'caption' => 'Мое первое фото'],
        ['file' => 'photo2.jpg', 'caption' => 'Путешествие в горы'],
        ['file' => 'photo3.jpg', 'caption' => 'Летний отдых']
    ];

    public static function getAll() {
        return self::PHOTO_DATA;
    }
}