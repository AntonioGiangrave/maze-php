<?php

namespace App\model;

class Step
{

    public Room $room;
    private array $objectCollected = [];

    public function __construct(Room $room, $objectCollected)
    {

        $this->room = $room;

        $this->objectCollected = $objectCollected;
    }

    /**
     * @return int
     */
    public function getRoomId()
    {
        return $this->room->getId();
    }

    /**
     * @return string
     */
    public function getObjectFoundList()
    {
        $list = [];

        foreach ($this->objectCollected as $objectCollected) {
            $list[] = $objectCollected->getName();
        }

        return join(',', $list);
    }

}
