<?php
require_once '../models/Photo.php';

class PhotoController {
    public function handle() {
        $photos = Photo::getAll();
        include '../views/photo.php';
    }
}

(new PhotoController())->handle();