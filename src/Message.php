<?php

namespace Lanternfish;

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
            return $this->getOption();
        } elseif (EXPLAIN_MSG_TYPE == $msgType) {
            echo EXPLAIN_MSG;
            return $this->helper->setParams();
        }
    }


    public function getOption()
    {
        fscanf(STDIN, "%s", $option);
        return $this->helper->continueOrLeave($option);
    }

    public function resultMsg($initialState, $days, $fishesTotal)
    {
        $this->helper->clearScreen();

        echo "\n * Initial state: " . $initialState;
        echo "\n\n * Days: " . $days;
        echo "\n\n\n => After " . $days . " days there are " . $fishesTotal . " lanternfishes! \n\n";
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