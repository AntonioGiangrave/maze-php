<?php

namespace App\model;


use PHPUnit\Framework\TestCase;

class RoomObjectTest extends TestCase
{

    protected RoomObject $roomObject;

    protected function setUp(): void
    {
        $mockRoomObject = json_decode("{ \"name\": \"Knife\" }");

        $this->roomObject = new RoomObject($mockRoomObject);
    }


    public function test__construct()
    {
        self::assertTrue($this->roomObject instanceof RoomObject);
    }


    public function testGetName()
    {
        self::assertTrue($this->roomObject->getName() == "Knife");
    }
}
