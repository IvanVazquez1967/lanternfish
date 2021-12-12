<?php

require __DIR__ . '/vendor/autoload.php';

use JetBrains\PhpStorm\NoReturn;
use Lanternfish\Lanternfish;
use Lanternfish\Message;
use Lanternfish\Helper;


declare(ticks = 1); // enable signal handling
#[NoReturn] function sigint()  {
    exit;
}
pcntl_signal(SIGINT, 'sigint');
pcntl_signal(SIGTERM, 'sigint');

$message = new Message();
$helper = new Helper();

$option = $message->welcomeMsg();

if ("n" == $option) {
    $message->byeMsg();
} elseif ("y" == $option) {
    $params = $helper->setParams();
}

$lanterfish = new Lanternfish($params[INITIAL_STATE_NODE], $params[DAYS_NODE]);
$lanterfish->spawn();
$helper->leaveApp();