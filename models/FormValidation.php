<?php
class FormValidation {
    protected $rules = [];
    protected $errors = [];

    public function setRule($field, $validator) {
        $this->rules[$field][] = $validator;
    }

    public function validate($data) {
        foreach ($this->rules as $field => $validators) {
            foreach ($validators as $validator) {
                $value = $data[$field] ?? '';
                $this->checkRule($field, $value, $validator);
            }
        }
        return empty($this->errors);
    }

    protected function checkRule($field, $value, $validator) {
        switch ($validator) {
            case 'required':
                if (empty(trim($value))) $this->addError($field, "Поле обязательно");
                break;
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($field, "Некорректный email");
                }
                break;
            case 'integer':
                if (!ctype_digit($value)) $this->addError($field, "Должно быть целое число");
                break;
        }
    }

    protected function addError($field, $message) {
        $this->errors[$field][] = $message;
    }

    public function showErrors() {
        foreach ($this->errors as $fieldErrors) {
            foreach ($fieldErrors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        }
    }
}