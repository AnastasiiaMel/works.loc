<?php
session_start();
require 'functions.php';

$edit_user_id = $_SESSION['edit_user_id'];
unset($_SESSION['edit_user_id']);


$username = $_POST['username'];
$job_title = $_POST['job_title'];
$address = $_POST['address'];
$phone = $_POST['phone'];



edit($username, $job_title, $phone, $address, $edit_user_id);

set_flash_message('success', 'Профиль успешно обновлен');
redirect_to('page_profile.php');