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

    return $result;
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


/**
 *  Parameters:
 *          string - $name
 *          string - $password
 *  Description: находим пользователя в БД
 *  Return value: NULL
 */
function login($email, $password){
    $pdo = new PDO('mysql:host=localhost;dbname=my_project', 'root', '');
    $sql = "SELECT * FROM users WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $user_info = $statement->fetch(PDO::FETCH_ASSOC);
    $password_correct = password_verify($password, $user_info['password']);

    if ($password_correct){
        $_SESSION['user']=$user_info;
    }
    else{
        unset($_SESSION['user']);
    }
}


/**
 *  Parameters:
 *  Description: проверяем, что пользователь авторизовался
 *  Return value: true || false
 */
function is_logged_in(): bool
{
    if (isset($_SESSION['user'])){
        return true;
    }
    else{
        return false;
    }
}


/**
 *  Parameters:
 *  Description: проверяем, что пользователь не авторизовался
 *  Return value: true || false
 */
function is_not_logged_in(): bool
{
    return !is_logged_in();
}


/**
 *  Parameters:
 *  Description: Выгружаем всех пользователей из БД
 *  Return value: Array
 */
function get_users(){
    $pdo = new PDO('mysql:host=localhost;dbname=my_project', 'root', '');
    $sql = "SELECT * FROM users";
    $statement = $pdo->query($sql);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}


/**
 *  Parameters:
 *  Description: Получаем авторизованного пользователя
 *  Return value: Array || false
 */
function get_authenticated_user(){
    if(is_logged_in()){
        return $_SESSION['user'];
    }
    else{
        return false;
    }
}

/**
 *  Parameters:
 *  Description: Проверяем является ли пользователь админом
 *  Return value: true || false
 */
function is_admin($user){
    if(is_logged_in()){
        if($user['role']==='admin'){
        return true;
        }
    return false;
    }
}

/**
 *  Parameters:
 *  Description: Проверяем одинаковые ли пользователи из зарегистрированных и в БД
 *  Return value: true || false
 */
function is_equal($user, $current_user){
    if ($user['id'] === $current_user['id']){
        return true;
    }
    else{
        return false;
    }
}