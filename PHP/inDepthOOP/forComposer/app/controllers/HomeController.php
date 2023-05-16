<?php
namespace App\controllers;
use App\QueryBuilder;
use League\Plates\Engine;

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

        // Render a template
        echo $this->templates->render('about', ['name' => 'Jonathan about page']);


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
