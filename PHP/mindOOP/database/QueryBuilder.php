<?php
class QueryBuilder{
    protected $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo;
    }


    public function getAll($table){
        $sql = "SELECT * FROM {$table}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getOne($table, $id){
       $sql = "SELECT * FROM posts WHERE id=:id";
      $statement = $this->pdo->prepare($sql);
      $statement->bindValue(':id', $id);
      $statement->execute();
      $result = $statement-> fetch(PDO::FETCH_ASSOC );
      return $result;
    }

    public function create($table, $data){
        $keys = implode(',', array_keys($data));
        $tags = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$table} ({$keys}) VALUE ({$tags})";


        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }



}