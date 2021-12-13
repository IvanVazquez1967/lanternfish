<?php

namespace Lanternfish;

use JetBrains\PhpStorm\NoReturn;
use JetBrains\PhpStorm\Pure;
use Lanternfish\Helper;

class Message
{
    public Helper $helper;

    function __construct()
    {
        $this->helper = new Helper();
    }

    public function mainMsg($msgType)
    {
        $this->helper->clearScreen();
        if (INTRO_MSG_TYPE == $msgType) {
            echo INTRO_MSG;
        }

        return $this->getOption();
    }


    public function getOption()
    {
        fscanf(STDIN, "%s", $option);
        return $this->helper->continueOrLeave($option);
    }

    public function resultMsg($initialState, $days, $finalState, $fishesTotal)
    {
        $this->helper->clearScreen();

        echo "\n The new Lanternfishes have been spawned! \n";
        echo "\n * initial state: " . $initialState;
        echo "\n * days: " . $days. "\n";
        //echo "\n * final state: " . $finalState. "\n";
        echo "\n * At the end there are " . $fishesTotal . " lanternfishes! \n";
    }
    
    public function exitMsg()
    {
        echo EXIT_MSG;
        $this->helper->leaveApp();
    }

    public function byeMsg()
    {
        echo BYE_MSG;
        $this->helper->leaveApp();
    }

}