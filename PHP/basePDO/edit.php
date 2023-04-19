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
            <h3>Edit</h3>

            <div class="row">
                <div class="col-md-6">
                    <form action="update.php" method="post">
                        <input type="hidden" name="id" value=" <?php echo $user['id']?>">
                        <input type="text" name="name" class="form-control" value="<?php echo $user['name'];?>">
                        <input type="text" name="email" class="form-control" value="<?php echo $user['email'];?>">
                        <button type="submit" class="btn btn-warning" style="margin-top:10px;">Edit user</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

