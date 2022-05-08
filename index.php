<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

//Starts session
session_start();

//Require the autoload file
require_once('vendor/autoload.php');

//creates an instance of base class
$f3=Base::instance();

//Define a default route
$f3->route('GET /', function(){
    $view = new Template();
    echo $view->render('views/home.html');
});
//Define a home route
$f3->route('GET /home', function(){
    $view = new Template();
    echo $view->render('views/home.html');
});
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
});
//Define a Pricing route
$f3->route('GET /Pricing', function(){
    $view = new Template();
    echo $view->render('views/Pricing.html');
});
//Define a createProfile route
$f3->route('GET /CreateProfile', function(){

    $view = new Template();
    echo $view->render('views/createProfile.html');
});
//Define a createProfile2 route
$f3->route('POST /CreateProfile2', function(){

    $_SESSION['fname']=$_POST['fname'];
    $_SESSION['lname']=$_POST['lname'];
    $_SESSION['Age']=$_POST['Age'];
    $_SESSION['gridRadios']=$_POST['gridRadios'];
    $_SESSION['Phone']=$_POST['Phone'];

    $view = new Template();
    echo $view->render('views/createProfile2.html');
});
//Define a createProfile3 route
$f3->route('POST /CreateProfile3', function(){

    $_SESSION['gridRadios1']=$_POST['gridRadios1'];
    $_SESSION['state']=$_POST['state'];
    $_SESSION['aboutMe']=$_POST['aboutMe'];
    $_SESSION['email']=$_POST['email'];
    $view = new Template();
    echo $view->render('views/createProfile3.html');
});
//Define a summary route
$f3->route('GET|POST /summary', function(){
    if (empty($_POST['conds'])) {
        $conds = "No Hobby selected";
    }
    else {
        $conds = implode(", ", $_POST['conds']);
    }
    $_SESSION['conds'] = $conds;
    $view = new Template();
    echo $view->render('views/Summary.html');
});

//runs fat free
$f3->run();