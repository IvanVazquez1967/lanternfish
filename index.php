<?php

require __DIR__ . '/vendor/autoload.php';

use App\Helper;
use App\Message;
use App\Lanternfish;


$helper = new Helper();
$message = new Message();
$lanterfish = new Lanternfish();

$params = $message->mainMsg(INTRO_MSG_TYPE);

$lanterfish->spawn($params[INITIAL_STATE_NODE], $params[DAYS_NODE]);
$helper->leaveApp();