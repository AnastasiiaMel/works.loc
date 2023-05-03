<?php
session_start();
require 'functions.php';

$status = $_POST['status'];
$edit_user_id = $_SESSION['edit_user_id'];

set_status($status, $edit_user_id);


set_flash_message('success', 'Профиль успешно обновлен');
redirect_to('page_profile.php?id='.$edit_user_id);

