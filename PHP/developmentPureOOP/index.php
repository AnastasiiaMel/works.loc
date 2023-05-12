<?php
require_once 'init.php';

//var_dump(Session::get(Config::get('session.user_session')));

$user = new User();
$anotherUser = new User(7);
if ($user->isLoggedIn()){
    echo "Hi, <a href='#'>{$user->data()->username}</a>";
    echo "<p><a href='logout.php'>Logout</a></p>";
}else{
    echo "<a href='login.php'>Login</a> or <a href='register.php'>Register</a>";
}



//if ($user->isLoggedIn()){
    //
//}else{
    //
//}


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

//$users=Database::getInstance()->get('users', ['username', '=', 'Marlin2']);
//echo $users->first()->username;

//if($users->error()){
  //  echo 'We have an error';
//} else{
  //  foreach ($users->results() as $user){
    //    echo $user->username . '<br>';
    //}
//}



//echo Config::get('mysql.host');
//$users = Database::getInstance()->query('select * from users');
//var_dump($users->results());
//Redirect::to('test.php');
//Redirect::to(404);

