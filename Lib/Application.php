<?php

namespace Lib;

abstract class Application {

    const RACINE = '/Controleur/';
    const RACINE_IMAGE = '/Controleur/Web/images/';

    protected $user, $layout, $name;

    public abstract function run();

    public function getControler($module) {
        $nomControleur = '\Controler\\' . $this->name . '\\' . ucfirst($module) . 'Controler';
        if (class_exists($nomControleur)) {
            return $controleur = new $nomControleur($this);
        } else {
            throw new \Exception('Module non trouvé');
        }
    }

    public function __construct() {
        // on initialise un utilisateru connecter ou un utlisateur vide
        if (isset($_SESSION['user'])) {
            $this->user = $_SESSION['user'];
        } else {
            $this->user = new \Modele\user;
        }
    }

    public function getUser() {
        return $this->user;
    }

    public function getLayout() {
        return $this->layout;
    }

    public function setUser($user) {
        $this->user = $user;
        return $this;
    }

    public function setLayout($layout) {
        $this->layout = $layout;
        return $this;
    }

}
