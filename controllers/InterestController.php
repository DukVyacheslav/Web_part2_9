<?php
require_once '../models/Interest.php';

class InterestController {
    public function handle() {
        $interests = Interest::getAll();
        include '../views/interests.php';
    }
}

(new InterestController())->handle();