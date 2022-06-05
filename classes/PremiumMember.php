<?php


/**
 * PremiumMember represents a plus user extending from normal member
 */
class PremiumMember extends Member
{

    /**
     * represents $_inDoorIntrests array
     * @var array
     */
    private array $_inDoorIntrests;
    /**
     * represents $_outDoorIntrests array
     * @var array
     */
    private array $_outDoorIntrests;

    /**
     * gets Indoor interests
     * @return array|string[]
     */
    public function getInDoorIntrests()
    {
        return  $this->_inDoorIntrests;
    }

    /**
     * sets Indoor interests
     * @param array|string[] $inDoorIntrests
     */
    public function setInDoorIntrests(array $inDoorIntrests)
    {
        $this->_inDoorIntrests = $inDoorIntrests;
    }

    /**
     * gets outdoor interests
     * @return array|string[]
     */
    public function getOutDoorIntrests(): array
    {
        return  $this->_outDoorIntrests;
    }

    /**
     * sets outdoor interests
     * @param array|string[] $outDoorIntrests
     */
    public function setOutDoorIntrests(array $outDoorIntrests)
    {
        $this->_outDoorIntrests = $outDoorIntrests;
    }


}

