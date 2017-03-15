<?php

namespace Modele;

/**
 * Description of Notes
 *
 * @author Human Booster
 */
class Notes extends \Lib\Entite {

    protected $pseudo, $date, $valeur, $produit;

    public function __construct($data = []) {
        $this->date = new \DateTime;
        //var_dump($data);
        parent::__construct($data);
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function getDate() {
        return $this->date;
    }

    public function getValeur() {
        return $this->valeur;
    }

    public function getProduit() {
        return $this->produit;
    }

    public function setPseudo($pseudo) {
        //var_dump($pseudo);
        if (strlen($pseudo) >= 2) {
            $this->pseudo = $pseudo;
            //var_dump($pseudo);
            return $this;
        } else {
            $this->erreur[] = 'Pseudo pas bon';

            //var_dump($pseudo);
        }
    }

    public function setDate($date) {
        $this->date = new \DateTime($date);
        return $this;
    }

    public function setValeur($valeur) {
        $this->valeur = $valeur;
        return $this;
    }

    public function setProduit($produit) {
        $this->produit = $produit;
        return $this;
    }

}
