<?php
class FormValidation {
    private $rules = [];
    public $errors = []; // Сделал public для доступа в дочерних классах

    public function setRule($field_name, $validator_name) {
        $this->rules[$field_name] = $validator_name;
    }

    public function isNotEmpty($data) {
        return empty(trim($data)) ? "Поле не должно быть пустым" : null;
    }

    public function isInteger($data) {
        return !filter_var($data, FILTER_VALIDATE_INT) ? "Значение должно быть целым числом" : null;
    }

    public function isEmail($data) {
        return !filter_var($data, FILTER_VALIDATE_EMAIL) ? "Некорректный email" : null;
    }

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
            }

            if ($error) {
                $this->errors[$field] = $error;
            }
        }
        return empty($this->errors);
    }

    public function showErrors() {
        if (empty($this->errors)) return '';
        $html = '<ul style="color: red;">';
        foreach ($this->errors as $field => $error) {
            $html .= "<li>Ошибка в поле $field: $error</li>";
        }
        $html .= '</ul>';
        return $html;
    }
}
?>