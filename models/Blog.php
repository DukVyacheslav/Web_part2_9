<?php
require_once 'Model.php';

class Blog extends Model {
    protected static $tablename = 'blogs';
    
    public $id;
    public $name;
    public $text;
    public $img;
    public $data;
    
    public function __construct() {
        parent::__construct();
        $this->validator = new ResultsVerification();
        $this->validator->SetRule('name', 'IsNotEmpty');
        $this->validator->SetRule('text', 'IsNotEmpty');
    }
    
    public function validate($post_data) {
        $this->validator->Validate($post_data);
        return count($this->validator->Errors) == 0;
    }

    public static function getPaginated($page = 1, $per_page = 10) {
        try {
            if (!static::$pdo) {
                throw new Exception('Отсутствует подключение к базе данных');
            }

            $offset = ($page - 1) * $per_page;
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . static::$tablename . 
                   " ORDER BY data DESC LIMIT :offset, :per_page";
                   
            $stmt = static::$pdo->prepare($sql);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindValue(':per_page', $per_page, PDO::PARAM_INT);
            $stmt->execute();
            
            $result = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $obj = new static();
                foreach ($row as $key => $value) {
                    $obj->$key = $value;
                }
                $result[] = $obj;
            }
            
            // Получаем общее количество записей
            $total = static::$pdo->query("SELECT FOUND_ROWS()")->fetchColumn();
            
            return [
                'items' => $result,
                'total' => $total,
                'pages' => ceil($total / $per_page)
            ];
        } catch (Exception $e) {
            error_log($e->getMessage());
            return [
                'items' => [],
                'total' => 0,
                'pages' => 0,
                'error' => 'Ошибка при получении записей блога'
            ];
        }
    }

    public static function importFromCSV($filename) {
        try {
            if (!static::$pdo) {
                throw new Exception('Отсутствует подключение к базе данных');
            }

            if (!file_exists($filename)) {
                throw new Exception('Файл не найден');
            }

            $handle = fopen($filename, "r");
            if ($handle === FALSE) {
                throw new Exception('Не удалось открыть файл');
            }

            static::$pdo->beginTransaction();

            $sql = "INSERT INTO " . static::$tablename . " (name, text, img, data) VALUES (:name, :text, :img, NOW())";
            $stmt = static::$pdo->prepare($sql);

            $success = true;
            $row = 1;
            while (($data = fgetcsv($handle)) !== FALSE) {
                if (count($data) >= 2) {
                    try {
                        $params = [
                            ':name' => $data[0],
                            ':text' => $data[1],
                            ':img' => isset($data[2]) ? $data[2] : null
                        ];
                        
                        if (!$stmt->execute($params)) {
                            throw new Exception("Ошибка при добавлении записи в строке $row");
                        }
                    } catch (Exception $e) {
                        error_log("Ошибка в строке $row: " . $e->getMessage());
                        $success = false;
                        break;
                    }
                }
                $row++;
            }

            fclose($handle);

            if ($success) {
                static::$pdo->commit();
                return true;
            } else {
                static::$pdo->rollBack();
                return false;
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            if (isset($handle) && $handle !== FALSE) {
                fclose($handle);
            }
            if (isset(static::$pdo)) {
                static::$pdo->rollBack();
            }
            throw $e;
        }
    }
}
?>