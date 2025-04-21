<?php
require_once __DIR__.'/../models/Blog.php';
require_once __DIR__.'/../views/View.php';

class BlogController {
    private $model;
    private $view;
    private $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
    private $maxFileSize = 5242880; // 5MB
    
    public function __construct() {
        $this->model = new Blog();
        $this->view = new View();
    }
    
    public function index() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 10;
        
        $result = Blog::getPaginated($page, $per_page);
        // Удаляем временный вывод var_dump
        $this->view->render('blog/index.php', 'Мой блог', [
            'posts' => $result['items'],
            'total' => $result['total'],
            'pages' => $result['pages'],
            'current_page' => $page
        ]);
    }
    
    public function editor() {
        $posts = Blog::findAll();
        $this->view->render('blog/editor.php', 'Редактор блога', ['posts' => $posts]);
    }
    
    public function save() {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->validate($_POST)) {
                $this->model->name = $_POST['name'];
                $this->model->text = $_POST['text'];
                $this->model->data = date('Y-m-d H:i:s');
                
                // Обработка загруженного изображения
                if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                    if (!in_array($_FILES['img']['type'], $this->allowedImageTypes)) {
                        $errors[] = 'Недопустимый тип файла. Разрешены только JPEG, PNG и GIF.';
                    } elseif ($_FILES['img']['size'] > $this->maxFileSize) {
                        $errors[] = 'Размер файла превышает 5MB.';
                    } else {
                        $uploadDir = 'public/images/blog/';
                        if (!file_exists($uploadDir)) {
                            if (!mkdir($uploadDir, 0777, true)) {
                                $errors[] = 'Ошибка создания директории для загрузки.';
                            }
                        }
                        
                        if (empty($errors)) {
                            $fileName = uniqid() . '_' . htmlspecialchars($_FILES['img']['name']);
                            $filePath = $uploadDir . $fileName;
                            
                            if (move_uploaded_file($_FILES['img']['tmp_name'], $filePath)) {
                                $this->model->img = $fileName;
                            } else {
                                $errors[] = 'Ошибка при загрузке изображения.';
                            }
                        }
                    }
                }
                
                if (empty($errors)) {
                    if (!$this->model->save()) {
                        $errors[] = 'Ошибка при сохранении записи в базу данных.';
                    }
                }
            } else {
                $errors[] = 'Пожалуйста, проверьте правильность заполнения всех полей.';
            }
        }
        
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: index.php?controller=blog&action=editor&status=error');
        } else {
            $_SESSION['success'] = 'Запись успешно сохранена.';
            header('Location: index.php?controller=blog&action=editor&status=success');
        }
        exit;
    }
    
    public function upload() {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
            $file = $_FILES['csv_file'];
            if ($file['error'] === UPLOAD_ERR_OK) {
                // Проверка типа файла
                $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimeType = finfo_file($fileInfo, $file['tmp_name']);
                finfo_close($fileInfo);
                
                if ($mimeType !== 'text/csv' && $mimeType !== 'application/vnd.ms-excel') {
                    $errors[] = 'Пожалуйста, загрузите файл в формате CSV.';
                } elseif ($file['size'] > $this->maxFileSize) {
                    $errors[] = 'Размер файла превышает 5MB.';
                } else {
                    $tempName = $file['tmp_name'];
                    if (!Blog::importFromCSV($tempName)) {
                        $errors[] = 'Ошибка при импорте данных из CSV файла.';
                    }
                }
            } else {
                $errors[] = 'Ошибка при загрузке файла: ' . $this->getFileErrorMessage($file['error']);
            }
        }
        
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else if (isset($tempName)) {
            $_SESSION['success'] = 'Данные успешно импортированы из CSV файла.';
        }
        
        $this->view->render('blog/upload.php', 'Загрузка сообщений блога', [
            'errors' => $errors
        ]);
    }
    
    private function getFileErrorMessage($code) {
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
                return 'Размер файла превышает допустимый размер.';
            case UPLOAD_ERR_FORM_SIZE:
                return 'Размер файла превышает указанный в форме.';
            case UPLOAD_ERR_PARTIAL:
                return 'Файл был загружен частично.';
            case UPLOAD_ERR_NO_FILE:
                return 'Файл не был загружен.';
            case UPLOAD_ERR_NO_TMP_DIR:
                return 'Отсутствует временная папка.';
            case UPLOAD_ERR_CANT_WRITE:
                return 'Ошибка записи файла на диск.';
            case UPLOAD_ERR_EXTENSION:
                return 'Загрузка файла была остановлена расширением PHP.';
            default:
                return 'Неизвестная ошибка при загрузке файла.';
        }
    }
}
?>