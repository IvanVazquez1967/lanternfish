<?php

namespace Lanternfish;

class Lanternfish
{
    private string $initialState;
    private int $days;

    public function __construct(int $initialState, int $days)
    {
        $this->initialState = $initialState;
        $this->days = $days;
    }

    /**
     * Calculate the lantern fishes shoal's final state at the end of given days
     *
     * @return void
     */
    public function spawn()
    {
        $currentState = explode("", strval($this->initialState));
        $days = $this->days;

        for ($i = 0; $i <= $days; $i++) {
            for ($j = 0; $j <= count($currentState); $j++) {
                $individualState = intval($currentState[$j]);
                $individualState --;

                if (BIRTHING_LANTERNFISH == $individualState) {
                    $individualState = RELIEVED_LANTERNFISH;
                    $currentState[] = BABY_LANTERNFISH;
                }
            }
        }

        $finalState = implode(",", $currentState);

        echo "\n The new Lanternfishes have been spawned! \n";
        echo "\n fishes: " . $this->initialState;
        echo "\n days: " . $this->days. "\n";
        echo "\n final state: " . $finalState. "\n";
        echo "\n At the end there are " . strlen($finalState) . " lanternfishes! \n";
    }

}