<?php

require_once '../Lib/Autoload.php';

use Lib\Frontend;

$frontend = new Frontend();
session_start();
$frontend->run();


