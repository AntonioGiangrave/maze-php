<?php

namespace App\model;


use PHPUnit\Framework\TestCase;

class StepTest extends TestCase
{

    protected Step $step;

    protected function setUp(): void
    {
        $mockRoomJson = json_decode("{ \"id\": 3, \"name\": \"Kitchen\",\"east\":2, \"south\":3, \"objects\": [ { \"name\": \"Knife\" } ] }");

        $mockRoom = new Room($mockRoomJson);

        $mockRoomObjectJson = json_decode("{ \"name\": \"Knife\" }");

        $roomObject = new RoomObject($mockRoomObjectJson);

        $this->step = new Step($mockRoom, [$roomObject]);

    }

    public function testObjectList()
    {

        self::assertTrue($this->step->getObjectFoundList() == 'Knife');

    }

    public function testGetRoomId()
    {

        self::assertTrue($this->step->getRoomId() == 3);

    }
}
