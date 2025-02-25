<?php
class MainController {
    public function handle() {
        // Можно добавить логику для главной страницы
        include '../views/main.php';
    }
}

(new MainController())->handle();