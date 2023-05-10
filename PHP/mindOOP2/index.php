<?php
class Connection{
    public static function make(): PDO
    {
        return  new PDO("mysql:host=localhost;dbname=lesson01", "root", "" );
    }
}


class QueryBilder{
    private $db;
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    public function select($table){

        $statement = $this->db->query( "SELECT * FROM $table");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}



$db = new QueryBilder(Connection::make());
$users = $db->select('users');
$posts = $db->select('posts');



var_dump($users, $posts);