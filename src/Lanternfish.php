<?php

namespace Lanternfish;

class Lanternfish
{
    private string $initialState;
    private int $days;
    public Message $message;

    public function __construct(int $initialState, int $days)
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
        $currentState = str_split(strval($this->initialState));
        $initialStateArray = implode(",", $currentState);
        $days = $this->days;

        for ($i = 1; $i <= $days; $i++) {
            for ($j = 0; $j < count($currentState); $j++) {

                $individualState = intval($currentState[$j]);

                if (BIRTHING_LANTERNFISH == $individualState) {
                    $individualState = RELIEVED_LANTERNFISH;
                    array_push($currentState,BABY_LANTERNFISH);
                }

                $individualState--;
                $currentState[$j] = $individualState;
            }
        }

        print_r($currentState);
        $finalState = implode(",", $currentState);
        $this->message->resultMsg($initialStateArray, $this->days, $finalState, count($currentState));
    }

}