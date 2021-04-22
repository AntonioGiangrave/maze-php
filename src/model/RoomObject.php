<?php

namespace App\model;


class RoomObject
{
    private string $name;

    public function __construct($object)
    {
        $this->name = $object->name;

    }

    public function getName()
    {
        return $this->name;
    }


}
