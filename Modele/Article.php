<?php

namespace Modele;

/**
 * Description of Article
 *
 * @author Human Booster
 */
class Article extends \Lib\Entite {

    protected $titre, $contenu, $image, $slug;

    /**
     * @var int Nom de l'auteur
     */
    protected $auteur;

    /**
     * @var \DateTime
     */
    protected $date;

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = new \DateTime($date);
        return $this;
    }

    public function __construct($data = []) {

        $this->date = new \DateTime();
        parent::__construct($data);
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getImage() {
        return $this->image;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
        return $this;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
        return $this;
    }

    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    public function setAuteur($auteur) {
        $this->auteur = $auteur;
        return $this;
    }

}
