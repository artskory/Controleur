<?php

namespace Lib;

/**
 * Description of Entite
 *
 * @author Human Booster
 */
abstract class Entite {

    use \Tools\Extrait;

    protected $id;
    protected $erreur = [];

    public function getErreur() {
        return $this->erreur;
    }

    public function setErreur($erreur) {
        $this->erreur = $erreur;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function __construct($data = []) {
        $this->hydratation($data);
    }

    protected function hydratation($data = []) {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

}
