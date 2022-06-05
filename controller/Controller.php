<?php


class Controller
{
    private $_f3; //F3 object

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function Features()
    {
        $view = new Template();
        echo $view->render('views/Features.html');
    }

    function entry()
    {
        $view = new Template();
        echo $view->render('views/entry.html');
    }

    function LoginPage()
    {
        $view = new Template();
        echo $view->render('views/LoginPage.html');
    }

    function CreateProfile($f3)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            var_dump($_POST);
            //get name from post array
            $fname = $_POST['fname'];
            $f3->set('userFname', $fname);

            $membership = $_POST['membership'];
            $f3->set('membership', $membership);

            $lname = $_POST['lname'];
            $f3->set('userLname', $lname);

            $Age = $_POST['Age'];
            $f3->set('userAge', $Age);

            $Phone = $_POST['Phone'];
            $f3->set('userPhone', $Phone);

            $gridRadios = $_POST['gridRadios'];
            $f3->set('userGender', $gridRadios);

            if (!empty($membership)) {
                $membership = true;
                $member = new PremiumMember();

            } else {
                $membership = false;
                $member = new Member();
                $_SESSION['conds'] = 'Upgrade to a Premium Member for this feature!';
            }

            //Fname validation
            if (Validation::validname($fname)) {

                $member->setFname($fname);

                $_SESSION['member'] = $member;

                //store in session array
                $_SESSION['fname'] = $fname;
            } else {
                //if data is not valid store an error message
                $f3->set('errors["fname"]', 'Please enter a alphabetic name at least two characters');
            }

            //L name Validation
            if (Validation::validName($lname)) {

                //store in session array
                $_SESSION['lname'] = $lname;

                $member->setLname($lname);
            } else {
                //if data is not valid store an error message
                $f3->set('errors["lname"]', 'Please enter a alphabetic name at least two characters');
            }

//        AGE validation
            if (Validation::validAge($Age)) {

                //store in session array
                $_SESSION['Age'] = $Age;

                $member->setAge($Age);

            } else {
                //if data is not valid store an error message
                $f3->set('errors["Age"]', 'Please enter a age between 18 and 118');
            }

            //Phone validation
            if (Validation::validPhone($Phone)) {

                //store in session array
                $_SESSION['Phone'] = $Phone;

                $member->setPhone($Phone);
            } else {
                //if data is not valid store an error message
                $f3->set('errors["Phone"]', 'Please enter a valid phone number');
            }

            $_SESSION['membership'] = $membership;

            if (empty($f3->get('errors'))) {
                if ($gridRadios == !null) {
                    $member->setGender($gridRadios);
                }
                header('location: createProfile2');
            }
        }

        $view = new Template();
        echo $view->render('views/createProfile.html');
    }

    function CreateProfile2($f3)
    {
        $member = $_SESSION['member'];

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

            $state = $_POST['state'];
            $f3->set('state', $state);

            $bio = $_POST['bio'];
            $f3->set('bio', $bio);

            if (Validation::validEmail($email)) {
                //store in session array

                $member->setEmail($email);
                $member->setState($state);
                if ($aboutMe == !null) {
                    $member->setBio($aboutMe);
                } else {
                    $member->setBio
                    ('Uh oh! No bio here');
                }

                if ($gridRadios1 == !null) {
                    $member->setSeeking
                    ($gridRadios1);
                } else {
                    $member->setSeeking
                    ('n/a');
                }

            } else {
                //if data is not valid store an error message
                $f3->set('errors["email"]', 'Please enter a valid email');
            }
            if ($_SESSION['membership'] == false) {
                header('location: Summary');
            } else {
                header('location: createProfile3');
            }
        }


        $view = new Template();
        echo $view->render('views/createProfile2.html');
    }

    function CreateProfile3($f3)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $member = $_SESSION['member'];
            $GLOBALS['member'];
            $conds = $_POST['conds'];
            $conds2 = $_POST['conds2'];


            if (Validation::validIndoor($conds) and Validation::validOutdoor
                ($conds2)) {
                $_SESSION['conds'] = $conds;
                $_SESSION['conds2'] = $conds2;

                if (empty($_POST['conds']) and empty($_POST['conds2'])) {
                    $conds = "No Hobby selected";
                } else {
                    if ($conds == !null) {
                        $member->setInDoorIntrests($conds);

                    }
                    if ($conds2 == !null) {
                        $member->setOutDoorIntrests($conds2);
                    }
                }
                header('location: summary');
            } else {
                $f3->set('errors["conds"]', 'Invalid');
            }
        }
        $f3->set('conds', datalayer::getConds());
        $f3->set('conds2', datalayer::getConds2());

        $view = new Template();
        echo $view->render('views/createProfile3.html');
    }

    function summary($f3)
    {
        $member = $_SESSION['member'];


        var_dump($_POST);
        $view = new Template();

        if ($_SESSION['membership'] == true) {

            if ($_SESSION['conds'] == !null) {
                $f3->set('errors["interest"]', $member->getInDoorIntrests());
                $_SESSION['object'] = implode(", ", $member->getInDoorIntrests
                ());
            }

            if ($_SESSION['conds2'] == !null) {
                $f3->set('errors["interest"]', $member->getOutDoorIntrests());
                $_SESSION['object2'] = implode(", ",
                    $member->getOutDoorIntrests());

            }
        }
        echo $view->render('views/Summary.html');

        //session_destroy();
    }    //end of class
}