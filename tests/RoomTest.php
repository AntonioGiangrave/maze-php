<?php

namespace App\model;

use PHPUnit\Framework\TestCase;

class RoomTest extends TestCase
{

    protected Room $room;

    protected function setUp(): void
    {
        $mockRoom = json_decode("{ \"id\": 3, \"name\": \"Kitchen\",\"east\":2, \"south\":3, \"objects\": [ { \"name\": \"Knife\" } ] }");

        $this->room = new Room($mockRoom);
    }

    public function test__construct()
    {

        self::assertTrue($this->room->getId() == 3);

        self::assertTrue($this->room->getName() == "Kitchen");

    }

    public function testGetLinkedRoom()
    {

        $linkedRoom = $this->room->getLinkedRoom();

        self::assertTrue(in_array(2, $linkedRoom));

        self::assertTrue(in_array(3, $linkedRoom));

        self::assertFalse(in_array(1, $linkedRoom));

    }


    public function testHasObject()
    {

        $foundObject = $this->room->hasObject(['Knife', 'Spoon']);

        self::assertTrue($foundObject[0] instanceof RoomObject);

        self::assertTrue($foundObject[0]->getName() == 'Knife');

        self::assertTrue(count($foundObject) == 1);

    }
}
