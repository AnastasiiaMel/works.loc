<?php
session_start();
require 'functions.php';

$email = $_POST['email'];
$password = $_POST['password'];
$status = $_POST['status'];

$username = $_POST['username'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$job_title = $_POST['job_title'];

$vk = $_POST['vk'];
$telegram = $_POST['telegram'];
$instagram = $_POST['instagram'];

$avatar = $_FILES['avatar']['name'];
$tmp_avatar = $_FILES['avatar']['tmp_name'];

$user = get_user_by_email($email);
if (!empty($user)){
    set_flash_message("danger", "Этот эл. адрес уже занят другим пользователем");
    redirect_to("create_user.php");
}


$id = (add_user($email, $password));

upload_avatar($avatar, $tmp_avatar, $id);

edit($username, $job_title, $phone, $address, $id);

set_status($status, $id);

add_social_links($telegram, $instagram, $vk, $id);

set_flash_message("success", "Пользователь добавлен");
redirect_to('users.php');