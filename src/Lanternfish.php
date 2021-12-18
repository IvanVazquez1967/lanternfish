<?php

namespace App;

use Exception;

class Lanternfish
{

    private $days;
    private $message;
    private $initialState;

    public function __construct()
    {
        $this->message = new Message();
    }

    /**
     * Calculate the lantern fishes shoal's final state at the end of given days
     *
     * @return void
     */
    public function spawn($initialState, $days)
    {
        $this->days = $days;
        $this->initialState = $initialState;

        $days = intval($this->days);
        $currentState = explode(",", $this->initialState);

        //Generating an array that contains each of possible lanternfish states
        $distinctIndividualStates = [];
        for ($k = BIRTHING_LANTERNFISH; $k <= BABY_LANTERNFISH; $k++) {
            $distinctIndividualStates[$k] = 0;
        }

        //Counting the entry distinct states amount
        foreach ($currentState as $value) {
            $distinctIndividualStates[$value] += 1;
        }

        for ($i = 1; $i <= $days; $i++) {

            $birthingLanternfishes = $distinctIndividualStates[BIRTHING_LANTERNFISH];
            $distinctIndividualStates[BIRTHING_LANTERNFISH] = 0;

            for ($state = NEARLY_BIRTHING_LANTERNFISH; $state < count($distinctIndividualStates); $state++) {
                $distinctIndividualStates[$state - 1] += $distinctIndividualStates[$state];
                $distinctIndividualStates[$state] = 0;
            }

            $distinctIndividualStates[RELIEVED_LANTERNFISH] += $birthingLanternfishes;
            $distinctIndividualStates[BABY_LANTERNFISH] += $birthingLanternfishes;
        }

        $lanternfishesTotal = 0;
        foreach ($distinctIndividualStates as $state => $amount) {
            $lanternfishesTotal += $amount;

            //If lanternfishes counting is bigger than PHP_INT_MAX
            if (PHP_INT_MAX <= $lanternfishesTotal) {
                $lanternfishesTotal = "Infinite";
            }
        }

        $this->message->resultMsg($this->initialState, $this->days, $lanternfishesTotal);
        return $lanternfishesTotal;
    }


}