<?php
session_start();
require 'functions.php';

$email = $_POST['email'];

$password = $_POST['password'];
login($email, $password);
if (is_not_logged_in()){
    set_flash_message("danger", "Неверный логин или пароль");
    redirect_to("page_login.php");
}
else{
    redirect_to("users.php");
}
