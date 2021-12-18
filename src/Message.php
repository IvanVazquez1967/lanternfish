<?php

namespace App;

class Message
{
    private $helper;
    private $messageType;

    function __construct()
    {
        $this->helper = new Helper();
    }

    public function mainMsg($msgType)
    {
        $this->messageType = $msgType;
        $this->helper->clearScreen();

        if (INTRO_MSG_TYPE == $this->messageType) {
            echo INTRO_MSG;
            return $this->getOption();
        } elseif (EXPLAIN_MSG_TYPE == $this->messageType) {
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
        echo "\n\n\n => After " . $days . " days there will be " . $fishesTotal . " lanternfishes! \n\n";
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