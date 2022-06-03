<?php


//Starts session
session_start();

//Require the autoload file
require_once('vendor/autoload.php');

//creates an instance of base class
$f3 = Base::instance();
$con = new Controller($f3);
$dataLayer = new DataLayer();

//Define a default route
$f3->route('GET /', function () {

    $GLOBALS['con']->home();
});
//Define a home route
$f3->route('GET /home', function () {
    $GLOBALS['con']->home();
});

//Define a Features route
$f3->route('GET /Features', function () {

    $GLOBALS['con']->Features();

});
//Define a views route
$f3->route('GET /entry', function () {

    $GLOBALS['con']->entry();

});
//Define a LoginPage route
$f3->route('GET /LoginPage', function () {

    $GLOBALS['con']->LoginPage();

});
//Define a Pricing route
$f3->route('GET /Pricing', function () {
    $GLOBALS['con']->Pricing();
});
//Define a createProfile route
$f3->route('GET|POST /CreateProfile', function ($f3) {
    $GLOBALS['con']->CreateProfile($f3);
});
//Define a createProfile2 route
$f3->route('GET|POST /CreateProfile2', function ($f3) {
    var_dump($_SESSION);
    $GLOBALS['con']->CreateProfile2($f3);
});
//Define a createProfile3 route
$f3->route('GET|POST /CreateProfile3', function ($f3) {
    var_dump($_SESSION);
    $GLOBALS['con']->CreateProfile3($f3);
});
//Define a summary route
$f3->route('GET|POST /summary', function () {
    $GLOBALS['con']->summary();
});

//runs fat free
$f3->run();