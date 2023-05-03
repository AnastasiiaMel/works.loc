<?php
session_start();
require 'functions.php';

$email = $_POST['email'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat_password'];

$edit_user_id = $_SESSION['edit_user_id'];


if($password !== $repeat_password){
    set_flash_message("danger", "Пароли не совпадают!");
    redirect_to("security.php?id=".$edit_user_id);
}

$email_base = get_user_by_email($email);

if( empty($email_base['email']) || $edit_user_id == $email_base['id'] ){
    edit_credentials($edit_user_id, $email, $password);
}
else{
    set_flash_message("danger", "Этот email уже занят другим пользователем!");
    redirect_to("security.php?id=".$edit_user_id);
}

if(empty($password))


set_flash_message('success', 'Профиль успешно обновлен');
redirect_to('page_profile.php?id='.$edit_user_id);

