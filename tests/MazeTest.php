<?php

namespace App\model;

use PHPUnit\Framework\TestCase;

class MazeTest extends TestCase
{

    protected Maze $maze;

    protected function setUp(): void
    {
        $testMap = 'map01.json';

        $this->maze = new Maze($testMap);
    }

    public function test__construct()
    {

        self::assertTrue(isset($this->maze->mazeMap));

        self::assertTrue(count($this->maze->rooms) > 0);

    }


    public function testGetRoom()
    {

        $testRoom = $this->maze->getRoom(1);

        self::assertTrue($testRoom->getId() == 1);

    }

}

