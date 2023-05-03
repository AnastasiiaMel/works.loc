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
    return $name;
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
    $statement->execute([
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
 *          string $user
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
 *          string $user
 *          string $current_user
 *  Description: Проверяем одинаковые ли пользователи из зарегистрированных и в БД
 *  Return value: true || false
 */
function is_equal($user, $current_user): bool
{
    if ($user['id'] === $current_user['id']){
        return true;
    }
    else{
        return false;
    }
}

/**
 *  Parameters:
 *          string $username
 *          string $job_title
 *          string $phone
 *          string $address
 *          string $id
 *  Description: Изменяем данные пользователя
 *  Return value: NULL
 */
function edit($username, $job_title, $phone, $address, $id){
    $pdo = new PDO('mysql:host=localhost;dbname=my_project', 'root', '');
    $sql = "UPDATE `users` set username = :username, job_title = :job_title, phone = :phone, address = :address WHERE users.id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['username' => $username, 'job_title' => $job_title, 'phone' => $phone, 'address' => $address, 'id'=>$id]);

}

/**
 *  Parameters:
 *          string $status
 *          string $id
 *  Description: Изменяем статус пользователя
 *  Return value: NULL
 */
function set_status($status, $id){
    $pdo = new PDO('mysql:host=localhost;dbname=my_project', 'root', '');
    $sql = "UPDATE `users` set status = :status WHERE users.id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['status' => $status, 'id'=>$id]);
}

/**
 *  Parameters:
 *          string $avatar
 *          string $tmp_avatar
 *          string $id
 *  Description: Изменяем аватарку пользователя
 *  Return value: NULL
 */
function upload_avatar($avatar, $tmp_avatar, $id){
    $tmp_upload = 'img/demo/avatars/';
    $uniq_name = uniqid();
    $extension = explode('.', $avatar);
    $new_name = $uniq_name.'.'.$extension[array_key_last($extension)];
    $new_tmp = $tmp_upload.$new_name;
    move_uploaded_file($tmp_avatar, $new_tmp);

    $pdo = new PDO('mysql:host=localhost;dbname=my_project', 'root', '');
    $sql = "UPDATE `users` set image = :avatar WHERE users.id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['avatar'=> $new_tmp, 'id'=>$id]);
    $statement->fetch(PDO::FETCH_ASSOC);

}

/**
 *  Parameters:
 *          string $telegram
 *          string $instagram
 *          string $vk
 *          string $id
 *  Description: Изменяем ссылки на соц сети пользователя
 *  Return value: NULL
 */
function add_social_links($telegram, $instagram, $vk, $id){
    $pdo = new PDO('mysql:host=localhost;dbname=my_project', 'root', '');
    $sql = "UPDATE `users` set telegram = :telegram, instagram = :instagram, vk = :vk WHERE users.id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['telegram' => $telegram, 'instagram' => $instagram, 'vk' => $vk, 'id'=>$id]);

}

/**
 *  Parameters:
 *          string $edit_user_id
 *  Description: Проверяем что поользователь которого редактируют, редактирует его владелец
 *  Return value: true || false
 */
function is_author($edit_user_id): bool
{
    if($edit_user_id === $_SESSION['user']['id']){
        return true;
    }
    else{
        return false;
    }
}

/**
 *  Parameters:
 *
 *  Description: Очищает сессию
 *  Return value:
 */
function log_out(){
    unset($_SESSION['user']);
    unset($_SESSION['edit_user_id']);
    unset($_GET);
}

/**
 *  Parameters:
 *          string $id
 *          string $email
 *          string password
 *  Description: Изменяем у пользователя логин или пароль
 *  Return value:
 */
function edit_credentials($id, $email, $password){
    $pdo = new PDO('mysql:host=localhost;dbname=my_project', 'root', '');
    if(empty($password)){
        $sql = "UPDATE `users` set email = :email WHERE users.id=:id";
        $statement = $pdo->prepare($sql);
        $statement->execute(['email' => $email, 'id'=>$id]);
    }
    else {
        $sql = "UPDATE `users` set email = :email, password = :password WHERE users.id=:id";
        $statement = $pdo->prepare($sql);
        $statement->execute(['email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT), 'id' => $id]);
    }
}

/**
 *  Parameters:
 *          string $id
 *  Description: Удаляем профиль
 *  Return value:
 */
function delete_profile($id){
    $users = get_users();
    foreach ($users as $user){
        if($id==$user['id']);
        $avatar = $user;
    }
    unlink($avatar['image']);


    $pdo = new PDO('mysql:host=localhost;dbname=my_project', 'root', '');
    $sql = "DELETE FROM `users` WHERE users.id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id'=>$id]);
}