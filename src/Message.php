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

    public function welcomeMsg(): string
    {
        $this->helper->clearScreen();
        echo INTRO_MSG;

        return $this->getParams();
    }

    public function getParams(): string
    {
        fscanf(STDIN, "%s", $option);

        if ("y" != $option && "n" != $option) {
            $this->exitMsg();
        }

        return $option;
    }

    #[NoReturn]
    public function exitMsg()
    {
        echo EXIT_MSG;
        $this->helper->leaveApp();
    }

    #[NoReturn]
    public function byeMsg()
    {
        echo BYE_MSG;
        $this->helper->leaveApp();
    }

}