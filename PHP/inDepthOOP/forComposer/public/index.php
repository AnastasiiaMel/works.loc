<?php

require "../../vendor/autoload.php";

// Create new Plates instance
$templates = new League\Plates\Engine('../app/views');


// Render a template
echo $templates->render('about', ['title' => 'Jonathan']);





//if ($_SERVER['REQUEST_URI']=='/PHP/inDepthOOP/forComposer/home'){

  //  require '../app/controllers/homepage.php';
//}

//exit;




















//use Aura\SqlQuery\QueryFactory;

//

//var_dump($result);
//echo 123;