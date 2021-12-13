<?php

namespace Lanternfish;

use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\NoReturn;
use JetBrains\PhpStorm\Pure;

class Helper
{
    public Message $message;

    public function setParams(): array
    {
        $nodes = [];
        $params = [];
        $askForParams = [
            ASK_FOR_INITIAL_STATE => INITIAL_STATE_NODE,
            ASK_FOR_DAYS => DAYS_NODE
        ];

        $this->clearScreen();

        foreach ($askForParams as $msg => $param) {
            $nodes[] = $this->setValue($msg, $param);
            foreach ($nodes as $node) {
                $params[$node['key']] = $node['value'];
            }
        }

        return $params;
    }

    public function setValue($msg, $param): array
    {
        echo $msg;
        fscanf(STDIN, "%d\n", $value);
        $this->validate($value);

        return ['key' => $param, 'value' => $value];
    }

    public function validate($value)
    {
        $this->message = new Message();
        if (!is_int($value)) {
            $this->message->exitMsg();
        } else {
            return $value;
        }
    }

    public function continueOrLeave($option)
    {
        $this->message = new Message();

        if ("n" == $option || "N" == $option) {
            $this->message->byeMsg();
        } elseif ("y" == $option || "Y" == $option) {
            return $this->setParams();
        } else {
            $this->message->exitMsg();
        }
    }

    public function clearScreen()
    {
        system('clear');
    }

    public function leaveApp(): bool
    {
        exit(1);
    }
}




