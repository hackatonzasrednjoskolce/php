<?php

$commandName = $argv[1] ?? null;

switch ($commandName) {
    case 'init':
        require 'command/init.php';
        break;
    default:
        break;
}

