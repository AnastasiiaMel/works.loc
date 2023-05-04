<?php
class QueryBuilder{
    protected $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo;
    }


    function getAll(){
        $sql = 'SELECT * FROM posts';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
}