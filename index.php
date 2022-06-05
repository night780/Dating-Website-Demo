<?php

//Require the autoload file
require_once('vendor/autoload.php');

//Starts session
session_start();
//creates an instance of base class
$f3 = Base::instance();

$con = new Controller($f3);
$dataLayer = new DataLayer();

//Define a default route
$f3->route(/**
 * HOME
 * @return void
 */ 'GET /', function () {

    $GLOBALS['con']->home();
});
//Define a home route
$f3->route(/**
 * HOME
 * @return void
 */ 'GET /home', function () {
    $GLOBALS['con']->home();
});

//Define a Features route
$f3->route(/**
 * FEATURES
 * @return void
 */ 'GET /Features', function () {

    $GLOBALS['con']->Features();

});
//Define a views route
$f3->route(/**
 * ENTRY
 * @return void
 */ 'GET /entry', function () {

    $GLOBALS['con']->entry();

});
//Define a LoginPage route
$f3->route(/**
 * LOGIN
 * @return void
 */ 'GET /LoginPage', function () {

    $GLOBALS['con']->LoginPage();

});
//Define a Pricing route
$f3->route(/**
 * PRICING
 * @return void
 */ 'GET /Pricing', function () {
    $GLOBALS['con']->Pricing();
});
//Define a createProfile route
$f3->route(/**
 * CREATE PROFILE
 * @param $f3
 * @return void
 */ 'GET|POST /CreateProfile', function ($f3) {
    $GLOBALS['con']->CreateProfile($f3);
});
//Define a createProfile2 route
$f3->route(/**
 * CREATE PROFILE2
 * @param $f3
 * @return void
 */ 'GET|POST /CreateProfile2', function ($f3) {
    var_dump($_SESSION);
    $GLOBALS['con']->CreateProfile2($f3);
});
//Define a createProfile3 route
$f3->route(/**
 * CREATE PROFILE3
 * @param $f3
 * @return void
 */ 'GET|POST /CreateProfile3', function ($f3) {
    var_dump($_SESSION);
    $GLOBALS['con']->CreateProfile3($f3);
});
//Define a summary route
$f3->route(/**
 * SUMMARY
 * @param $f3
 * @return void
 */ 'GET|POST /summary', function ($f3) {
    var_dump($_SESSION['member']);
    $GLOBALS['con']->summary($f3);
});

//runs fat free
$f3->run();