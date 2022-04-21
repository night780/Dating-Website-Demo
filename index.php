<?php
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

//Define a home route
$f3->route('GET /home', function(){
    $view = new Template();
    echo $view->render('views/home.html');
}
);


//Define a Features route
$f3->route('GET /Features', function(){

    $view = new Template();
    echo $view->render('views/Features.html');
});
//Define a views route
$f3->route('GET /entry', function(){

    $view = new Template();
    echo $view->render('views/entry.html');
});

//Define a LoginPage route
$f3->route('GET /LoginPage', function(){

    $view = new Template();
    echo $view->render('views/LoginPage.html');
}
);
//Define a Pricing route
$f3->route('GET /Pricing', function(){
    $view = new Template();
    echo $view->render('views/Pricing.html');
});

//runs fat free
$f3->run();