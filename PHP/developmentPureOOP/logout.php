<?php
require_once 'init.php';

$user = new User;
$user->isLogout();

Redirect::to('index.php');