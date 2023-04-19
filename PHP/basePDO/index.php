<?php
$pdo = new PDO ("mysql:host=localhost;dbname=test;", 'root', '');
$statement = $pdo -> prepare("SELECT * FROM users");
$statement -> execute();
$users = $statement -> fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Users</h1>
        <a href="create.php" class="btn btn-success">Create</a>
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user):?>
                    <tr>
                        <td><?php echo $user['id'];?></td>
                        <td><?php echo $user['name'];?></td>
                        <td><?php echo $user['email'];?></td>
                        <td>
                            <a href="show.php?id=<?php echo $user['id'];?>" class="btn btn-info">Show</a>
                            <a href="edit.php?id=<?php echo $user['id'];?>" class="btn btn-warning">Edit</a>
                            <a onclick="return confirm('Are you sure?')" href="delete.php?id=<?php echo $user['id'];?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</body>
