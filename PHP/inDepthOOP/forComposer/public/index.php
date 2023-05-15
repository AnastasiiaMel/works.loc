<?php

require "../../vendor/autoload.php";

use Aura\SqlQuery\QueryFactory;

$queryFactory = new QueryFactory('mysql');

$select = $queryFactory->newSelect();
$select->cols(['*'])->from('posts');



$pdo = new PDO('mysql:host=localhost;dbname=app3', 'root', '');
$sth = $pdo->prepare($select->getStatement());
$sth->execute($select->getBindValues());
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

var_dump($result);
//echo 123;