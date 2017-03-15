<?php

namespace Lib;

use Exception;

abstract class Controleur {

    protected $app;

    public function __construct($app) {
        $this->app = $app;
    }

    public function action($action) {
        $nomAction = $action . 'Action';

        if (method_exists($this, $nomAction)) {
            $this->$nomAction();
        } else {
            throw new Exception('Action non définie pour ce module : ' . $action);
        }
    }

    protected abstract function indexAction();

    protected function render($vue, array $data = []) {
        extract($data);
        ob_start();

        include __DIR__ . '/../Vue/' . $vue;
        $contenu = ob_get_clean();

        include __DIR__ . '/../Vue/' . $this->app->getLayout();
    }

    public function getFlash() {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

    public function setFlash($valeur) {
        $_SESSION['flash'] = $valeur;
    }

    public function hasflash() {
        return isset($_SESSION['flash']);
    }

}
