<?php
class FormValidation {
    protected $rules = [];
    protected $errors = [];

    // Добавляем правило для поля
    public function setRule($field, $validator) {
        $this->rules[$field][] = $validator;
    }

    // Проверяем данные
    public function validate($postData) {
        foreach ($this->rules as $field => $validators) {
            foreach ($validators as $validator) {
                $value = $postData[$field] ?? '';
                $this->validateField($field, $value, $validator);
            }
        }
        return empty($this->errors);
    }

    // Проверка одного поля
    protected function validateField($field, $value, $validator) {
        switch ($validator) {
            case 'required':
                if (empty($value)) {
                    $this->errors[$field][] = "Поле обязательно для заполнения";
                }
                break;
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$field][] = "Некорректный email";
                }
                break;
            // Добавьте другие проверки по аналогии
        }
    }

    // Вывод ошибок
    public function showErrors() {
        if (!empty($this->errors)) {
            echo '<div class="errors">';
            foreach ($this->errors as $field => $errors) {
                foreach ($errors as $error) {
                    echo "<p>Ошибка в поле $field: $error</p>";
                }
            }
            echo '</div>';
        }
    }
}
?>