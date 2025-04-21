<?php
require_once __DIR__.'/../models/TestResult.php';
require_once __DIR__.'/../views/View.php';

class TestController {
    private $model;
    private $view;
    
    public function __construct() {
        $this->model = new TestResult();
        $this->view = new View();
    }
    
    public function index() {
        try {
            $results = TestResult::findAll();
            $this->view->render('test.php', 'Тест по дисциплине', [
                'results' => $results,
                'error' => null
            ]);
        } catch (Exception $e) {
            $this->view->render('test.php', 'Тест по дисциплине', [
                'results' => [],
                'error' => 'Произошла ошибка при загрузке теста'
            ]);
        }
    }
    
    public function save() {
        $errors = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                if ($this->model->validate($_POST)) {
                    $this->model->date = date('Y-m-d H:i:s');
                    $this->model->fio = $_POST['fio'];
                    $this->model->answers = json_encode($_POST['answers']);
                    $this->model->is_correct = isset($_POST['is_correct']) ? 1 : 0;
                    
                    if (!$this->model->save()) {
                        $errors[] = 'Ошибка при сохранении результатов теста';
                    }
                } else {
                    $errors[] = 'Пожалуйста, заполните все поля корректно';
                }
            } catch (Exception $e) {
                error_log($e->getMessage());
                $errors[] = 'Произошла ошибка при сохранении результатов';
            }
        }
        
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: index.php?controller=test&status=error');
        } else {
            $_SESSION['success'] = 'Результаты теста успешно сохранены';
            header('Location: index.php?controller=test&status=success');
        }
        exit;
    }
    
    public function results() {
        try {
            $results = TestResult::findAll();
            $this->view->render('test/results.php', 'Результаты тестов', [
                'results' => $results,
                'error' => null
            ]);
        } catch (Exception $e) {
            $this->view->render('test/results.php', 'Результаты тестов', [
                'results' => [],
                'error' => 'Произошла ошибка при загрузке результатов тестов'
            ]);
        }
    }
}
?>