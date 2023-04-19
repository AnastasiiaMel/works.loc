<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$sql = "SELECT * FROM users WHERE id=:id";
$statement = $pdo -> prepare($sql);
$statement -> execute($_GET);
$user = $statement -> fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Show user - <?php echo $user['name'];?></h1>


            </div>
        </div>
    </div>
</body>
