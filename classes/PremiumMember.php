<?php

class PremiumMember extends Member
{


    private array $_inDoorIntrests = array("tv", "movies", "Cooking", "Board"
    , "puzzles", "reading", "playingCards", "videoGames");

    private array $_outDoorIntrests = array("hiking", "biking", "swimming", "collecting"
    , "walking", "climbing");

    /**
     * @return array|string[]
     */
    public function getInDoorIntrests(): array
    {
        return $this->_inDoorIntrests;
    }

    /**
     * @param array|string[] $inDoorIntrests
     */
    public function setInDoorIntrests(array $inDoorIntrests)
    {
        $this->_inDoorIntrests = $inDoorIntrests;
    }

    /**
     * @return array|string[]
     */
    public function getOutDoorIntrests(): array
    {
        return $this->_outDoorIntrests;
    }

    /**
     * @param array|string[] $outDoorIntrests
     */
    public function setOutDoorIntrests(array $outDoorIntrests)
    {
        $this->_outDoorIntrests = $outDoorIntrests;
    }


}

