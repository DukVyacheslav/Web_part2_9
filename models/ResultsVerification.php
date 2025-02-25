<?php
require_once 'CustomFormValidation.php';

class ResultsVerification extends CustomFormValidation {
    private $score = 0;
    private $total_questions = 3; // Пример: 3 вопроса

    public function validate($post_array) {
        $this->score = 0;
        if (isset($post_array['question1']) && $post_array['question1'] === 'correct_answer1') $this->score++;
        if (isset($post_array['question2']) && $post_array['question2'] === 'correct_answer2') $this->score++;
        if (isset($post_array['question3']) && $post_array['question3'] === 'correct_answer3') $this->score++;
        return parent::validate($post_array);
    }

    public function showResults() {
        return "<p>Ваш результат: $this->score из $this->total_questions</p>";
    }
}
?>