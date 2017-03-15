<?php

use Lib\Application;

namespace Lib;

class BackEnd extends Application {

    public function run() {
        echo 'Je suis le backend';
        //echo password_hash(123, PASSWORD_DEFAULT);
    }

}
