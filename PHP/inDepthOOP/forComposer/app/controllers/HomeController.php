<?php
namespace App\controllers;
use App\QueryBuilder;

class HomeController{

    public function index($vars){
        d($vars);

        $db = new QueryBuilder();

        $db->update([
            'title' => 'new post from QueryFactory package2'
        ], 2, 'posts');
    }

    public function about($vars){
        d($vars);
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
