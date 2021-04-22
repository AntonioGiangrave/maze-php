<?php

namespace App\model;


use PHPUnit\Framework\TestCase;

class TrackTest extends TestCase
{

    protected Track $track;

    protected function setUp(): void
    {
        $this->track = $track = new Track();

        $mockRoomJson = json_decode("{ \"id\": 3, \"name\": \"Kitchen\",\"east\":2, \"south\":3, \"objects\": [ { \"name\": \"Knife\" } ] }");

        $mockRoom = new Room($mockRoomJson);

        $mockRoomObjectJson = json_decode("{ \"name\": \"Knife\" }");

        $roomObject = new RoomObject($mockRoomObjectJson);

        $step = new Step($mockRoom, [$roomObject]);

        $this->track->addStep($step);
    }

    public function testAddStep()
    {

        self::assertTrue($this->track instanceof Track);

    }

    public function testAlreadyVisit()
    {

        self::assertTrue($this->track->alreadyVisit(3));

    }

    public function testStepBack()
    {


        $mockRoomJson = json_decode("{ \"id\": 4, \"name\": \"Bedroom\",\"east\":1, \"south\":5, \"objects\": [ { \"name\": \"Spoon\" } ] }");

        $mockRoom = new Room($mockRoomJson);

        $mockRoomObjectJson = json_decode("{ \"name\": \"Spoon\" }");

        $roomObject = new RoomObject($mockRoomObjectJson);

        $step = new Step($mockRoom, [$roomObject]);

        $this->track->addStep($step);

        self::assertTrue($this->track->stepBack(2) == 3);

    }


    public function testVisitedRoom()
    {


        $mockRoomJson = json_decode("{ \"id\": 4, \"name\": \"Bedroom\",\"east\":1, \"south\":5, \"objects\": [ { \"name\": \"Spoon\" } ] }");

        $mockRoom = new Room($mockRoomJson);

        $mockRoomObjectJson = json_decode("{ \"name\": \"Spoon\" }");

        $roomObject = new RoomObject($mockRoomObjectJson);

        $step = new Step($mockRoom, [$roomObject]);

        $this->track->addStep($step);

        self::assertTrue(in_array(3, $this->track->visitedRoom()));

        self::assertTrue(in_array(4, $this->track->visitedRoom()));

    }
}
