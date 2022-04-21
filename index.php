<?php
ini_set('allow_url_fopen',1);
//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//creates an instance of base class
$f3=Base::instance();

//Define a default route
$f3->route('GET /', function(){
    $view = new Template();
    echo $view->render('views/home.html');
}
);

//runs fat free
$f3->run();