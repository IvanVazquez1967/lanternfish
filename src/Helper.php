<?php

namespace App;

class Helper
{
    private $message;

    public function setParams(): array
    {
        $nodes = [];
        $params = [];
        $askForParams = [
            ASK_FOR_INITIAL_STATE => INITIAL_STATE_NODE,
            ASK_FOR_DAYS => DAYS_NODE
        ];

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
        fscanf(STDIN, "%s\n", $value);
        $this->validate($param, $value);

        return ['key' => $param, 'value' => $value];
    }

    public function validate($key, $value)
    {//TODO: Replace with regex!
        $this->message = new Message();

        switch ($key)
        {
            case INITIAL_STATE_NODE:
                $initialStateArray = str_split($value);
                if (!(is_numeric($initialStateArray[0]) && ($initialStateArray[0] >= 1 && $initialStateArray[0] <= 6))) {
                    $this->message->exitMsg();
                } else {
                    for ($i = 1; $i < count($initialStateArray); $i++) {
                        if (($i % 2 == 0 && is_numeric($initialStateArray[$i]) && ($initialStateArray[$i] >= 1 && $initialStateArray[$i] <= 6)) ||
                            ($i % 2 != 0 && ($initialStateArray[$i] == ","))) {
                            continue;
                        } else {
                            $this->message->exitMsg();
                        }
                    }
                    return $value;
                }
                break;

            case DAYS_NODE:
                if (!is_numeric($value)) {
                    $this->message->exitMsg();
                } else {
                    return $value;
                }
                break;
        }
    }

    public function continueOrLeave($option)
    {
        $this->message = new Message();
        $option = strtolower($option);

        if ("n" == $option) {
            $this->message->byeMsg();
        } elseif ("y" == $option) {
            return $this->message->mainMsg(EXPLAIN_MSG_TYPE);
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
        exit();
    }
}




