<?php
require_once 'Database.php';
//$users = Database::getInstance()->query("SELECT * FROM users WHERE username IN (?,?)", ['John Doe', 'Jane Koe']);
//$users=Database::getInstance()->get('users', ['password', '=', 'password']);
//Database::getInstance()->delete('users', ['username', '=', 'Jane Koe']);
//$users=Database::getInstance()->insert('users', [
   // 'username' => 'Marlin',
    //'password' => 'password'
//]);

//$id=3;
//$users=Database::getInstance()->update('users',$id, [
  //  'username' => 'Marlin2',
    //'password' => 'password2'
//]);

$users=Database::getInstance()->get('users', ['username', '=', 'Marlin2']);
echo $users->first()->username;

//if($users->error()){
  //  echo 'We have an error';
//} else{
  //  foreach ($users->results() as $user){
    //    echo $user->username . '<br>';
    //}
//}



