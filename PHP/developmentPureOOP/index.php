<?php
require_once 'Database.php';
require_once 'Config.php';
require_once 'Validate.php';
require_once 'Input.php';

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

$GLOBALS['config'] = [
    'mysql' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'test_test',
        'something' => [
            'no' => 'yes'
        ]
    ]
];

//echo Config::get('mysql.host');
//$users = Database::getInstance()->query('select * from users');
//var_dump($users->results());


if (Input::exists()){
    $validate = new Validate();

    $validation = $validate->check($_POST, [
        'username' => [
            'required' => true,
            'min' => 2,
            'max'=>15,
            'unique' => 'users'
        ],
        'password' => [
            'required' => true,
            'min' => 3
        ],
        'password_again' => [
            'required' => true,
            'matches' => 'password'
        ]
    ]);

    if ($validation->passed()){
        echo 'passed';
    }else{
        foreach ($validation->errors() as $error){
            echo $error . '<br>';
        }
    }
}
?>

<form action="" method="post">
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo Input::get('username') ?>">
    </div>

    <div class="field">
        <label for="">Password</label>
        <input type="text" name="password">
    </div>

    <div class="field">
        <label for="">Password Again</label>
        <input type="text" name="password_again">
    </div>

    <div class="field">
        <button type="submit">Submit</button>
    </div>
</form>
