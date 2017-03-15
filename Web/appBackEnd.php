<?php

require_once '../Lib/Autoload.php';
session_start();

use Lib\BackEnd;

$backend = new BackEnd();

$backend->run();
