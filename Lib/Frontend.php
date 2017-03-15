<?php

namespace Lib;

class Frontend extends Application {

    public function run() {
        //echo 'Application lancée';
        if (isset($_GET['module'])) {
            $module = $_GET['module'];
        } else {
            $module = 'blog';
        }

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = 'index';
        }

        $controleur = $this->getControler($module);
        $controleur->action($action);
    }

}
