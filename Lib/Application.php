<?php

namespace Lib;

abstract class Application {

    const RACINE = '/Controleur/';
    const RACINE_IMAGE = '/Controleur/Web/images/';

    public abstract function run();

    public function getControler($module) {
        $nomControleur = '\Controler\\' . ucfirst($module) . 'Controler';
        if (class_exists($nomControleur)) {
            return $controleur = new $nomControleur();
        } else {
            throw new \Exception('Module non trouvé');
        }
    }

}
