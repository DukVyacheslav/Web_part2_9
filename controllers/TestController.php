<?php
require_once __DIR__.'/../models/CustomFormValidation.php';

class TestController {
    public function handle() {
        $test_errors = [];
        $test_result = null;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new CustomFormValidation();
            
            // Устанавливаем правила валидации
            $validator->setRule('fullName', 'required');
            $validator->setRule('group', 'required');
            $validator->setRule('question1', 'required');
            $validator->setRule('question2', 'required');
            $validator->setRule('question3', 'required');
            
            if ($validator->validate($_POST)) {
                $test_result = "Форма успешно отправлена! Спасибо за прохождение теста.";
            } else {
                $test_errors = "Пожалуйста, заполните все обязательные поля.";
            }
        }
        
        include __DIR__.'/../views/test.php';
    }
}