<?php

use Lib\Application;

namespace Lib;

class BackEnd extends Application {

    public function run() {
        //echo 'Je suis le backend';
        //echo password_hash(123, PASSWORD_DEFAULT);
        if ($this->user->isAdmin()) {
            //echo 'ok';
            if ($_SESSION['IPaddress'] != sha1($_SERVER['REMOTE_ADDR']) || $_SESSION['userAgent'] != sha1($_SERVER['HTTP_USER_AGENT'])) {
                exit('Grrr');
            }

            if (isset($_GET['module'])) {
                $module = $_GET['module'];
            } else {
                $module = 'article';
            }

            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = 'index';
            }

            $controleur = $this->getControler($module);
            $controleur->action($action);
        } else {
            $connection = $this->getControler('connection');
            if (isset($_POST['ok'])) {
                $connection->loginAction();
            } else {
                $connection->indexAction();
            }
        }
    }

    public function __construct() {
        $this->layout = 'layout_admin.html.php';
        parent::__construct();
    }

}
