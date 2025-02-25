<?php
require_once 'FormValidation.php';

class CustomFormValidation extends FormValidation {
    public function validateTestAnswers($data) {
        // Проверка специальных правил для теста
        if (!isset($data['question1'])) {
            $this->addError('question1', 'Выберите ответ');
        }
        return empty($this->errors);
    }
}