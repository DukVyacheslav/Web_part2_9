<?php
require_once 'Model/ResultsVerification.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['page']) && $_GET['page'] === 'test') {
    $validator = new ResultsVerification();
    $validator->setRule('question1', 'notEmpty');
    $validator->setRule('question2', 'notEmpty');
    $validator->setRule('question3', 'notEmpty');

    if ($validator->validate($_POST)) {
        echo $validator->showResults();
    } else {
        echo $validator->showErrors();
    }
}

include 'View/test.php';
?>