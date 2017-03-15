<?php

function autoload($classe) {
    $file = '../' . str_replace('\\', '/', $classe) . '.php';
    if (file_exists($file))
        include $file;
}

spl_autoload_register('autoload');
