<?php
session_start();
require 'functions.php';

$delete_user_id=$_GET['id'];

if($delete_user_id==$_SESSION['user']['id']){
    delete_profile($delete_user_id);
    log_out();
    set_flash_message('success', 'Вы удалили профиль!');
    redirect_to('page_register.php');
}
elseif($_SESSION['user']['role'] == 'admin'){
    delete_profile($delete_user_id);
    set_flash_message('success', 'Вы удалили профиль!');
    redirect_to('users.php');
}