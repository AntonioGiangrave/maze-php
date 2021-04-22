<?php

namespace App\model;


use LucidFrame\Console\ConsoleTable;

class Track
{

    /**
     * @var array
     */
    private array $steps = [];

    /**
     * @param Step $step
     */
    public function addStep(Step $step)
    {
        $this->steps[] = $step;
    }

    /**
     * @return array
     */
    public function visitedRoom()
    {
        $visit = [];

        foreach ($this->steps as $step) {
            $visit[] = $step->getRoomId();
        }

        return array_unique($visit);
    }

    /**
     * @param int $roomId
     * @return bool
     */
    public function alreadyVisit(int $roomId)
    {

        foreach ($this->steps as $step) {
            if ($step->getRoomId() == $roomId)
                return true;
        }

        return false;

    }

    /**
     * @param int $step
     * @return int
     */
    public function stepBack(int $step)
    {
        try {
            $step = $this->steps[count($this->steps) - $step];

            return $step->getRoomId();

        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }

    /**
     *
     */
    public function printTrack()
    {

        $table = new ConsoleTable();
        $table->addHeader('ID')
            ->addHeader('Name')
            ->addHeader('ItemsFound');

        foreach ($this->steps as $step) {
            $table
                ->addRow()
                ->addColumn($step->room->getId())
                ->addColumn($step->room->getName())
                ->addColumn($step->getObjectFoundList());

        };

        $table->display();

    }

}
