<?php
namespace App\controllers;
use App\QueryBuilder;
use Exception;
use League\Plates\Engine;
use function Tamtamchik\SimpleFlash\flash;

class HomeController{
    private $templates;
    public function __construct()
    {
        $this->templates = new Engine('../app/views');
    }

    public function index($vars){

        $db = new QueryBuilder();

        $posts = $db->getAll('posts');


        // Render a template
        echo $this->templates->render('homepage', ['posts' => $posts]);
    }

    public function about($vars){

        try{
           $this -> withdrow($vars['amount']);
        }catch (Exception $exception){
            flash()->error($exception->getMessage());

        }



        echo $this->templates->render('about', ['title' => 'Jonathan about page']);


    }

    public function withdrow($amount = 1){
        $total = 10;

        if($amount>$total){
            // .. Exception

            throw  new Exception('Недостаточно средств');
        }
    }

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
