<?php


class PremiumMember extends Member
{

    private array $_inDoorIntrests;
    private array $_outDoorIntrests;

    /**
     * @return array|string[]
     */
    public function getInDoorIntrests()
    {
        $array = $this->_inDoorIntrests;
        implode(",",  $array);
        return  $this->_inDoorIntrests = $array;
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
        $array = $this->_outDoorIntrests;
        implode(",",  $array);
        return  $this->_outDoorIntrests = $array;
    }

    /**
     * @param array|string[] $outDoorIntrests
     */
    public function setOutDoorIntrests(array $outDoorIntrests)
    {
        $this->_outDoorIntrests = $outDoorIntrests;
    }


}

