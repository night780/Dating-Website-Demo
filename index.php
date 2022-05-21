<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Starts session
session_start();

//Require the autoload file
require_once('vendor/autoload.php');
require_once('model/validation.php');
require_once ('model/datalayer.php');

//creates an instance of base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});
//Define a home route
$f3->route('GET /home', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});
//Define a Features route
$f3->route('GET /Features', function () {

    $view = new Template();
    echo $view->render('views/Features.html');
});
//Define a views route
$f3->route('GET /entry', function () {

    $view = new Template();
    echo $view->render('views/entry.html');
});
//Define a LoginPage route
$f3->route('GET /LoginPage', function () {

    $view = new Template();
    echo $view->render('views/LoginPage.html');
});
//Define a Pricing route
$f3->route('GET /Pricing', function () {
    $view = new Template();
    echo $view->render('views/Pricing.html');
});
//Define a createProfile route
$f3->route('GET|POST /CreateProfile', function ($f3) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //get name from post array
        $fname = $_POST['fname'];
        $f3->set('userFname', $fname);

        $lname = $_POST['lname'];
        $f3->set('userLname', $lname);

        $Age = $_POST['Age'];
        $f3->set('userAge', $Age);

        $Phone = $_POST['Phone'];
        $f3->set('userPhone', $Phone);

        //Fname validation
        if (validName($fname)) {
            //store in session array
            $_SESSION['fname'] = $fname;

        } else {
            //if data is not valid store an error message
            $f3->set('errors["fname"]', 'Please enter a alphabetic name at least two characters');
        }

        //L name Validation
        if (validName($lname)) {
            //store in session array
            $_SESSION['lname'] = $fname;

        } else {
            //if data is not valid store an error message
            $f3->set('errors["lname"]', 'Please enter a alphabetic name at least two characters');
        }

//        AGE validation
        if (validAge($Age)) {
            //store in session array
            $_SESSION['Age'] = $Age;

        } else {
            //if data is not valid store an error message
            $f3->set('errors["Age"]', 'Please enter a age between 18 and 118');
        }

        //Phone validation
        if (validPhone($Phone)) {
            //store in session array
            $_SESSION['Phone'] = $Phone;
        } else {
            //if data is not valid store an error message
            $f3->set('errors["Phone"]', 'Please enter a valid phone number');
        }

        if (empty($f3->get('errors'))) {
            $_SESSION['gridRadios'] = $_POST['gridRadios'];
            header('location: createProfile2');
        }

    }

    $view = new Template();
    echo $view->render('views/createProfile.html');
});
//Define a createProfile2 route
$f3->route('GET|POST /CreateProfile2', function ($f3) {
    var_dump($_SESSION);
    //Email validation
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Email
        $email = $_POST['email'];
        $f3->set('UserEmail', $email);

        //Bio
        $aboutMe = $_POST['aboutMe'];
        $f3->set('UserAboutMe', $aboutMe);

        //Seeking
        $gridRadios1 = $_POST['gridRadios1'];
        $f3->set('gridRadios1', $gridRadios1);


        if (validEmail($email)) {
            //store in session array
            $_SESSION['email'] = $email;
            header('location: createProfile3');
        } else {
            //if data is not valid store an error message
            $f3->set('errors["email"]', 'Please enter a valid email');
        }
    }
    $_SESSION['gridRadios1'] = $_POST['gridRadios1'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['aboutMe'] = $_POST['aboutMe'];

    $view = new Template();
    echo $view->render('views/createProfile2.html');
});
//Define a createProfile3 route
$f3->route('GET|POST /CreateProfile3', function ($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $conds = $_POST['conds'];


        if (validIndoor($conds) and validOutdoor($conds)) {
            if (empty($_POST['conds'])) {
                $conds = "No Hobby selected";
            } else {
                $conds = implode(", ", $_POST['conds']);
            }
            $_SESSION['conds'] = $conds;
            header('location: summary');
        }
        else{
            $f3->set('errors["conds"]', 'Invalid');
        }
    }
    $f3->set('conds', datalayer::getConds());
    $f3->set('conds2', datalayer::getConds2());




    $view = new Template();
    echo $view->render('views/createProfile3.html');

});
//Define a summary route
$f3->route('GET|POST /summary', function () {

    $view = new Template();
    echo $view->render('views/Summary.html');
});

//runs fat free
$f3->run();