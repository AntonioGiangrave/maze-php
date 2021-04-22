<?php

namespace App\model;


class Room
{
    private int $id;
    private string $name;
    private int $north;
    private int $south;
    private int $west;
    private int $east;

    private array $objects = [];

    private array $linkedRoom = [];

    public function __construct($room)
    {

        $this->id = $room->id;
        $this->name = $room->name;

        foreach ($room->objects as $object) {
            $this->objects[] = new RoomObject($object);
        }

        $this->north = isset($room->north) ? $room->north && $this->linkedRoom[] = $room->north : 0;
        $this->south = isset($room->south) ? $room->south && $this->linkedRoom[] = $room->south : 0;
        $this->east = isset($room->east) ? $room->east && $this->linkedRoom[] = $room->east : 0;
        $this->west = isset($room->west) ? $room->west && $this->linkedRoom[] = $room->west : 0;

    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }


    /**
     * @param $objectList
     * @return array
     */
    public function hasObject($objectList)
    {

        $findObject = [];

        foreach ($this->objects as $object) {
            if (in_array($object->getName(), $objectList)) {
                $findObject[] = $object;
            }
        }

        return $findObject;
    }

    /**
     * @return array
     */
    public function getLinkedRoom()
    {
        return $this->linkedRoom;
    }

}
