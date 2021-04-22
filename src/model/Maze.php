<?php

namespace App\model;

class Maze
{

    public $rooms = [];

    public $mazeMap = null;

    /**
     * Maze constructor.
     * @param $map
     */
    public function __construct($map)
    {
        $path = "/mnt/maps/" . $map;

        try {
            if (!file_exists($path))
                throw new \Exception("error: unable to find room {$path}");

            @json_decode(file_get_contents($path));

            if (json_last_error() != JSON_ERROR_NONE)
                throw new \Exception("error: json file not valid");

            $this->mazeMap = json_decode(file_get_contents($path));

            foreach ($this->mazeMap->rooms as $room) {
                $this->rooms[$room->id] = new Room($room);
            }

        } catch (\Exception $e) {
            exit ($e->getMessage());
        }

    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRoom($id)
    {
        try {
            foreach ($this->rooms as $room) {
                if ($id == $room->getId($id)) {
                    return $room;
                }
            }
            throw new \Exception("error: unable to find room {$id}");

        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }
}
