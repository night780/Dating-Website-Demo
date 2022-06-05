<?php

/**
 *Data page, where Data lives
 */
class DataLayer
{
    /*
     * diner/model/datalayer.php
     * returns data for the diner app
     */

//get the meals for the order form
// static methods do not access instance data (fields)
    /**
     * gets Indoor interests
     * @return string[]
     */
    static function getConds()
    {
        return array("tv", "movies", "Cooking", "Board"
        ,"puzzles","reading","playingCards","videoGames");
    }

    /**
     * gets Outdoor interests
     * @return string[]
     */
    static function getConds2()
    {
        return array("hiking", "biking", "swimming", "collecting"
        ,"walking","climbing");
    }

//getAllConds exist due to comparison logic in validation.php

    /**
     * gets all interests for validation
     * @return string[]
     */
    static function getAllConds()
    {
        return array("hiking", "biking", "swimming", "collecting"
        ,"walking","climbing","tv", "movies", "Cooking", "Board"
        ,"puzzles","reading","playingCards","videoGames");
    }

}