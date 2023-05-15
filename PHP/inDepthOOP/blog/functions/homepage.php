
<?php
#include '../functions.php';
$db = include '../database/start.php';
require 'Classes/Class1.php';
require 'Classes/Class2.php';

$class1 = new Class1();
$class2 = new Class2();



exit;
$posts = $db->getAll('posts');

include '../index.view.php';
