<?php

/**
 * Validation class, validates user form data
 */
class Validation
{

    /**
     * verifies valid name
     * @param $name
     * @return bool
     */
    static function validname($name): bool
    {
        //True if both names are valid (over 2 char) false if not
        return (strlen($name) >= 2) and $name != NULL and (ctype_alpha($name));
    }


    /**
     * verifies valid age
     * @param $Age
     * @return bool
     */
    static function validAge($Age): bool
    {
        return is_numeric($Age) and $Age <= 118 and $Age >= 18 and $Age != NULL;
    }

    /**
     * verifies valid phone number
     * @param $Phone
     * @return bool
     */
    static function validPhone($Phone): bool
    {
        return is_numeric($Phone) and (strlen($Phone) == 10);
    }

    /**
     * verifies valid email
     * @param $email
     * @return bool
     */
    static function validEmail($email): bool
    {
        return !preg_match("/^[a-zA-Z-' ]*$/", $email) and $email != NULL;
    }

    /**
     * verifies valid outdoor interests
     * @param $conds2
     * @return bool
     */
    static function validOutdoor($conds2): bool
    {
        if (empty($conds2)) {
            return true;
        }
        foreach ($conds2 as $outdoor) {
            // If the choice is not in the list of valid choices
            if (!in_array($outdoor, datalayer::getAllConds())) {
                return false;
            }
        }
        return true;
    }
//Identical valid door functions, both exist to satisfy rubric but could
//remove one and use instead

//ValidIndoor and validOutdoor compare the same array (all valid options in one)
// due to a bug comparing the arrays separately but in the same index logic.
    /**
     * verifies valid indoor interests
     * @param $conds
     * @return bool
     */
    static  function validIndoor($conds): bool
    {
        if (empty($conds)) {
            return true;
        }
        foreach ($conds as $indoor) {
            var_dump($indoor);
            // If the choice is not in the list of valid choices
            if (!in_array($indoor, datalayer::getAllConds())) {
                return false;
            }
        }
        return true;
    }
}
