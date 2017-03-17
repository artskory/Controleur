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

    static public function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

}
