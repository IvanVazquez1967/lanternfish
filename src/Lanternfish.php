<?php

namespace Lanternfish;

class Lanternfish
{
    private string $initialState;
    private int $days;
    public Message $message;

    public function __construct(string $initialState, string $days)
    {
        $this->initialState = $initialState;
        $this->days = $days;
        $this->message = new Message();
    }

    /**
     * Calculate the lantern fishes shoal's final state at the end of given days
     *
     * @return void
     */
    public function spawn()
    {
        $initialStateArray = $this->initialState;
        $currentState = explode(",", $this->initialState);
        $days = $this->days;

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

            for ($state = NEARLY_BIRTHING_LANTERNFISH; $state < count($distinctIndividualStates); $state ++) {
                $distinctIndividualStates[$state - 1] += $distinctIndividualStates[$state];
                $distinctIndividualStates[$state] = 0;
            }

            $distinctIndividualStates[RELIEVED_LANTERNFISH] += $birthingLanternfishes;
            $distinctIndividualStates[BABY_LANTERNFISH] += $birthingLanternfishes;
        }

        $lanternfishesTotal = 0;
        foreach ($distinctIndividualStates as $state => $amount) {
            $lanternfishesTotal += $amount;

            //If lanternfishes counting is bigger than PHP_INT_MAX (9223372036854775807)
            if (PHP_INT_MAX <= $lanternfishesTotal) {
                $lanternfishesTotal = "Infinite";
            }
        }

        $this->message->resultMsg($initialStateArray, $this->days, $lanternfishesTotal);
    }

}