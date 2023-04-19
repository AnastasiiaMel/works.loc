<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$sql = "DELETE FROM users WHERE id=:id";
$statement = $pdo -> prepare($sql);
$statement -> execute($_GET);


header("Location:/PHP/basePDO/index.php");

?>