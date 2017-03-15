<?php

require_once '../Lib/Autoload.php';

use Lib\BackEnd;

$backend = new BackEnd();
session_start();
$backend->run();
