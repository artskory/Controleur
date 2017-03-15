<?php

namespace Modele;

use Lib\Entite;

class Produit extends Entite {

    protected $titre, $contenu, $prix, $slug;

    /**
     *
     * @var Image
     */
    protected $image;

    /**
     *
     * @var Categorie
     */public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie(Categorie $categorie) {
        $this->categorie = $categorie;
        return $this;
    }

    protected $categorie;

    public function getTitre() {
        return $this->titre;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getImage() {
        return $this->image;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
        return $this;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
        return $this;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
        return $this;
    }

    public function setImage(Image $image) {
        $this->image = $image;
        return $this;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

}
