<?php
require_once __DIR__.'/../models/CustomFormValidation.php';

class TestController {
    public function handle() {
        $errors = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new CustomFormValidation();
            $validator->setRule('name', 'required');
            
            if ($validator->validate($_POST) && $validator->validateTestAnswers($_POST)) {
                // Обработка правильных ответов
                $_SESSION['test_results'] = $this->checkAnswers($_POST);
                header('Location: /?page=test-results');
                exit;
            }
            $errors = $validator->errors;
        }
        
        include __DIR__.'/../views/test.php';
    }

    private function checkAnswers($answers) {
        $correct = [
            'question1' => 'PHP',
            'question2' => 'GET'
        ];
        
        $results = [];
        foreach ($answers as $key => $value) {
            if (isset($correct[$key])) {
                $results[$key] = ($value == $correct[$key]);
            }
        }
        return $results;
    }
}