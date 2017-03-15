<?php

use Lib\Application;

namespace Lib;

class BackEnd extends Application {

    public function run() {
        //echo 'Je suis le backend';
        //echo password_hash(123, PASSWORD_DEFAULT);
        $connection = $this->getControler('connection');
        if (isset($_POST['ok'])) {
            $connection->loginAction();
        } else {
            $connection->indexAction();
        }
    }

    public function __construct() {
        $this->layout = 'layout_admin.html.php';
        parent::__construct();
    }

}
