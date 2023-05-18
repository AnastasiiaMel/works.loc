<?php
namespace App\controllers;
use App\exceptions\AccountsBlockedException;
use App\exceptions\NotEnoughMoneyException;
use App\QueryBuilder;
use Exception;
use League\Plates\Engine;
use PDO;
use function Tamtamchik\SimpleFlash\flash;

class HomeController{
    private $templates, $auth, $qb;
    public function __construct(QueryBuilder $qb)
    {
        $this->qb = $qb;
        $this->templates = new Engine('../app/views');
        $db = new PDO('mysql:host=localhost;dbname=app3', 'root', '');
        $this->auth = new \Delight\Auth\Auth($db);
    }

    public function index(){

       d($this->qb); die();

        try {
            $this->auth->admin()->addRoleForUserById('1', \Delight\Auth\Role::ADMIN);
        }
        catch (\Delight\Auth\UnknownIdException $e) {
            die('Unknown user ID');
        }
        die();

        $db = new QueryBuilder();

        $posts = $db->getAll('posts');


        // Render a template
        echo $this->templates->render('homepage', ['posts' => $posts]);
    }

    public function about(){



        try {
            $userId = $this->auth->register('rahim2@marlin.ru', 123, 'Rahim', function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
                echo '  For emails, consider using the mail(...) function, Symfony Mailer, Swiftmailer, PHPMailer, etc.';
                echo '  For SMS, consider using a third-party service and a compatible SDK';
            });

            echo 'We have signed up a new user with the ID ' . $userId;
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }


      //  try{
        //   $this -> withdrow($vars['amount']);
        //}catch (NotEnoughMoneyException $exception){
          //  flash()->error("Ваш баланс меньше чем ".$vars['amount']);

        //}catch (AccountsBlockedException $exception){
          //  flash()->error("Ваш аккаунт временно заблокирован");
        //}



        //echo $this->templates->render('about', ['title' => 'Jonathan about page']);


    }

    public function email_verification(){
        try {
            $this->auth->confirmEmail('_C0bz8ESRwgBGyBz', '0jGZDRMHMYFR-9ej');

            echo 'Email address has been verified';
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            die('Invalid token');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            die('Token expired');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('Email address already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }


    public function login(){
        try {
            $this->auth->login('rahim2@marlin.ru', '123');

            echo 'User is logged in';
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Wrong email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Wrong password');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            die('Email not verified');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }


 //   public function withdrow($amount = 1){
  //      $total = 10;

        //throw new AccountsBlockedException('Your account is blocked');

     //   if($amount>$total){
            // .. Exception

      //      throw  new NotEnoughMoneyException('Your balance is less than '.$amount);
       // }
   // }

}







//$db = new QueryBuilder();
 //$db->insert([
   // 'title' => 'new post from QueryFactory package'
//],'posts');

//$db->update([
  //  'title' => 'new post from QueryFactory package2'
//],15,'posts');

//$findOne = $db->findOne(['title'],'posts', 15);
//var_dump($findOne);

//$db->delete('posts', 15);
