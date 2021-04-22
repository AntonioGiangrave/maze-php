<?php

namespace App;

use App\model\Maze;
use App\model\Room;
use App\model\Step;
use App\model\Track;

require('vendor/autoload.php');

$app = new App($argv[1], $argv[2], $argv[3]);

$app->run();


class App
{
    private string $map;
    private int $initRoomId;
    private array $objectList;
    private Track $track;

    public function __construct($map, $initRoomId = 1, $objectList = null)
    {
        $this->map = $map;
        $this->initRoomId = $initRoomId;
        $this->objectList = explode(',', $objectList);
    }

    /**
     * run application
     */
    public function run()
    {
        $maze = new Maze($this->map);

        $this->track = $track = new Track();

        $currentRoom = $maze->getRoom($this->initRoomId);

        $this->solve($maze, $currentRoom);

    }

    /**
     * @param Maze $maze
     * @param Room $currentRoom
     * @param int $stepback
     */
    private function solve(Maze $maze, Room $currentRoom, $stepback = 2)
    {
        $objectCollect = $currentRoom->hasObject($this->objectList);

        $step = new Step($currentRoom, $objectCollect);
        $this->track->addStep($step);

        if (count($this->track->visitedRoom()) == count($maze->rooms)) {
            $this->track->printTrack();
            return;
        }

        $nextRoomId = $this->findNextRoom($currentRoom);

        if (!$nextRoomId) {
            $nextRoomId = $this->track->stepBack($stepback);
            $nextRoom = $maze->getRoom($nextRoomId);
            $this->solve($maze, $nextRoom, $stepback + 2);
        } else {
            $nextRoom = $maze->getRoom($nextRoomId);
            $this->solve($maze, $nextRoom);
        }

    }

    /**
     * @param Room $currentRoom
     * @return bool
     */
    private function findNextRoom(Room $currentRoom)
    {

        $linkedRooms = $currentRoom->getLinkedRoom();

        foreach ($linkedRooms as $linkedRoom) {
            if (!$this->track->alreadyVisit($linkedRoom))
                return $linkedRoom;
        }

        return false;

    }


}
