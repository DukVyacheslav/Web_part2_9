<?php
class Interest {
    // class properties and methods

    public static function getAll() {
        // logic to get all interests
        return [];
    }
}

require_once '../models/Interest.php';

class InterestController {
    public function handle() {
        $interests = Interest::getAll();
        include '../views/interests.php';
    }
}

(new InterestController())->handle();