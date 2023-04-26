<?php
session_start();

/**
 *  Parameters:
 *          string - $email
 *  Description: поиск пользователя по эл. адресу
 *  Return value: array
 */

function get_user_by_email($email){
    $pdo = new PDO('mysql:host=localhost;dbname=my_project', 'root', '');
    $sql = "SELECT * FROM users WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
}

/**
 *  Parameters:
 *          string - $name (ключ)
 *          string - $message (значение, текст сообщения)
 *  Description: подготовить флеш сообщение
 *  Return value: null
 */

function set_flash_message($name, $massage){
    $_SESSION[$name] = $massage;
}

/**
 *  Parameters:
 *          string - $path
 *  Description: перенаправить на другую страницу
 *  Return value: null
 */

function redirect_to($path){
    header("Location: {$path}");
    exit;
}

/**
 *  Parameters:
 *          string - $email
 *          string - $password
 *  Description: добавить пользователя в БД
 *  Return value: int (user_id)
 */

function add_user($email, $password){
    $pdo = new PDO('mysql:host=localhost;dbname=my_project', 'root', '');
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $statement = $pdo->prepare($sql);
    $result = $statement->execute([
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    return $pdo->lastInsertId();
}

/**
 *  Parameters:
 *          string - $name (ключ)
 *  Description: выыести флеш сообщение
 *  Return value: null
 */

function display_flash_message($name){
    if (isset($_SESSION[$name])){
        echo "<div class=\"alert alert-{$name} text-dark\" role=\"alert\">{$_SESSION[$name]}</div>";
        unset($_SESSION[$name]);
    }
}