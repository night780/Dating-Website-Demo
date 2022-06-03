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

            //Fname validation
            if (Validation::validname($fname)) {
                $member = new Member();

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


            if (!empty($membership)) {
                $membership = 'PremiumMember';

            } else {
                $membership = 'Member';
            }

            $_SESSION['membership'] = $membership;
            $_SESSION['gridRadios'] = $_POST['gridRadios'];

            if (empty($f3->get('errors'))) {

                header('location: createProfile2');
            }
        }

        $view = new Template();
        echo $view->render('views/createProfile.html');
    }

    function CreateProfile2($f3)
    {
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


            if (Validation::validEmail($email)) {
                //store in session array
                $_SESSION['email'] = $email;

                $_SESSION['member']->setEmail($email);

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
    }

    function CreateProfile3($f3)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $conds = $_POST['conds'];


            if (Validation::validIndoor($conds) and Validation::validOutdoor($conds)) {
                if (empty($_POST['conds'])) {
                    $conds = "No Hobby selected";
                } else {
                    $conds = implode(", ", $_POST['conds']);
                }
                $_SESSION['conds'] = $conds;
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

    function summary()
    {
        $view = new Template();
        echo $view->render('views/Summary.html');
    }    //end of class
}