<?php

require __DIR__ . '/vendor/autoload.php';

use JetBrains\PhpStorm\NoReturn;
use Lanternfish\Lanternfish;
use Lanternfish\Message;
use Lanternfish\Helper;

$message = new Message();
$helper = new Helper();

$params = $message->mainMsg("intro");

$lanterfish = new Lanternfish($params[INITIAL_STATE_NODE], $params[DAYS_NODE]);
$lanterfish->spawn();
$helper->leaveApp();