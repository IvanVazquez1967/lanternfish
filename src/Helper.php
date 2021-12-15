<?php

namespace Lanternfish;

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
    {//TODO: Do the correct validation of these inputs!
        $this->message = new Message();
        if (DAYS_NODE == $key && !is_string($value)) {
            $this->message->exitMsg();
        } elseif (INITIAL_STATE_NODE == $key && !is_string($value)) {
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
        exit(1);
    }
}




