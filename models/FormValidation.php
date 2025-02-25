<?php
class FormValidation {
    private $rules = [];
    private $errors = [];

    // Добавление правила валидации
    public function setRule($field_name, $validator_name) {
        $this->rules[$field_name] = $validator_name;
    }

    // Проверка на пустое значение
    public function isNotEmpty($data) {
        return empty(trim($data)) ? "Поле не должно быть пустым" : null;
    }

    // Проверка на целое число
    public function isInteger($data) {
        return !filter_var($data, FILTER_VALIDATE_INT) ? "Значение должно быть целым числом" : null;
    }

    // Проверка на минимальное значение
    public function isLess($data, $value) {
        if (!filter_var($data, FILTER_VALIDATE_INT)) return "Значение должно быть числом";
        return (int)$data < $value ? null : "Значение должно быть меньше $value";
    }

    // Проверка на максимальное значение
    public function isGreater($data, $value) {
        if (!filter_var($data, FILTER_VALIDATE_INT)) return "Значение должно быть числом";
        return (int)$data > $value ? null : "Значение должно быть больше $value";
    }

    // Проверка email
    public function isEmail($data) {
        return !filter_var($data, FILTER_VALIDATE_EMAIL) ? "Некорректный email" : null;
    }

    // Валидация данных формы
    public function validate($post_array) {
        $this->errors = [];
        foreach ($this->rules as $field => $validator) {
            $data = isset($post_array[$field]) ? $post_array[$field] : '';
            $error = null;

            switch ($validator) {
                case 'notEmpty':
                    $error = $this->isNotEmpty($data);
                    break;
                case 'integer':
                    $error = $this->isInteger($data);
                    break;
                case 'email':
                    $error = $this->isEmail($data);
                    break;
                case 'less10': // Пример: меньше 10
                    $error = $this->isLess($data, 10);
                    break;
                case 'greater0': // Пример: больше 0
                    $error = $this->isGreater($data, 0);
                    break;
            }

            if ($error) {
                $this->errors[$field] = $error;
            }
        }
        return empty($this->errors);
    }

    // Вывод ошибок в HTML
    public function showErrors() {
        if (empty($this->errors)) return '';
        $html = '<ul>';
        foreach ($this->errors as $field => $error) {
            $html .= "<li>Ошибка в поле $field: $error</li>";
        }
        $html .= '</ul>';
        return $html;
    }
}
?>