<?php
session_start();
require 'functions.php';

$edit_user_id = $_SESSION['edit_user_id'];
$new_avatar = $_FILES['new_avatar']['name'];
$tmp_avatar = $_FILES['new_avatar']['tmp_name'];



if(!empty($new_avatar)) {
    upload_avatar($new_avatar, $tmp_avatar, $edit_user_id);
}


set_flash_message('success', 'Профиль успешно обновлен');
redirect_to('page_profile.php?id='.$edit_user_id);
