<?php
class Database{
    private static $instance = null;
    private $pdo, $query, $eror = false, $results, $count;

    private function __construct(){
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=test_test', 'root', '');
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public static function getInstance(){
        if(!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function query($sql){
        $this->eror=false;
     $this->query = $this->pdo->prepare($sql);
     if(!$this->query->execute()){
         $this->eror = true;
     } else {
         $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
         $this->count = $this->query->rowCount();
     }
     return $this;
    }

    public function error(){
        return $this->eror;
    }

    public function results(){
        return $this->results;
    }

    public function count(){
        return $this->count;
    }
}
