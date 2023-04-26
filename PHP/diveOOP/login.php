<?php
session_start();
require 'functions.php';

$email = $_POST['email'];

$password = $_POST['password'];

if (login($email, $password)==false){
    set_flash_message("danger", "Неверный логин или пароль");
    redirect_to("page_login.php");
}
else{
    redirect_to("users.php");
}
