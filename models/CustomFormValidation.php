<?php
require_once 'FormValidation.php';

class CustomFormValidation extends FormValidation {
    // Property to store validation errors
    protected $errors = [];

    // Специализированная проверка теста
    public function isValidAnswer($data, $correct_answer) {
        return $data !== $correct_answer ? "Неверный ответ" : null;
    }

    // Переопределение validate для теста
    public function validate($post_array) {
        parent::validate($post_array); // Вызов базовой валидации
        // Пример: проверка конкретного вопроса
        if (isset($post_array['question1'])) {
            $error = $this->isValidAnswer($post_array['question1'], 'correct_answer1');
            if ($error) $this->errors['question1'] = $error;
        }
        return empty($this->errors);
    }
}
?>