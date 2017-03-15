<?php

namespace Controler;

use Lib\Controleur;
use Modele\CategorieManager;
use Modele\ProduitManager;

/**
 * Description of CatalogueControler
 *
 * @author Human Booster
 */
class CatalogueControler extends Controleur {

    protected function indexAction() {
        //echo 'je suis le CatalogueControler';
        //var_dump($article);
        $cm = new CategorieManager();
        $categories = $cm->getAllCategorie();
        //var_dump($categories);
        $this->render('catalogue/index.html.php', ['categories' => $categories]);
    }

    protected function categorieAction() {
        $pm = new ProduitManager();
        $produits = $pm->getProduitsByCategorieId($_GET['id']);
        $this->render('catalogue/categorie.html.php', ['produits' => $produits]);
    }

    protected function ProduitAction() {
        $pm = new \Modele\ProduitManager();
        $nm = new \Modele\NotesManager();
        $produit = $pm->getProduitById($_GET['id']);
        $notes = $nm->getNotesByProduitId($_GET['id']);
        if ($this->hasflash()) {
            $produit->setErreur($this->getFlash());
        }

        $this->render('catalogue/detail.html.php', ['produit' => $produit, 'notes' => $notes]);
        //var_dump($produit);
    }

    protected function noteAction() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $note = new \Modele\Notes($_POST);
            $nm = new \Modele\NotesManager();
            $pm = new \Modele\ProduitManager();
            $produit = $pm->getProduitById($note->getProduit());
            if ($note->getErreur() == []) {
                $nm->insertNote($note);
                $this->setFlash('cool');
            } else {
                $this->setFlash(implode(', ', $note->getErreur()));
            }

            header('Location: produit/' . $produit->getSlug() . '-' . $produit->getId());
            exit;
            //var_dump($note);
        }
    }

}
