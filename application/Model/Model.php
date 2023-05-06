<?php
namespace Old\Model;
use PDO;

class Model
{
    public $db = null;
    public function __construct()
    {
        try{
            self::connectDB();
        } catch (\PDOException $e) {
            exit('Cannot connect');
        }
    }

    private function connectDB()
    {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }
}