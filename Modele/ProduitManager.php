<?php

namespace Modele;

use Lib\EntiteManager;
use PDO;

/**
 * Description of ProduitManager
 *
 * @author Human Booster
 */
class ProduitManager extends EntiteManager {

    public function getProduitsByCategorieId($id) {
        $sql = 'SELECT * FROM produit WHERE categorie=?';

        $result = $this->pdo->prepare($sql);
        $result->bindParam(1, $id, \PDO::PARAM_INT);
        $result->execute();

        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Produit::class);
        $produits = $result->fetchAll();

        $im = new ImageManager();
        foreach ($produits as $produit) {
            if ($produit->getImage()) {
                $img = $im->getImageById($produit->getImage());
                $produit->setImage($img);
            }
        }

        return $produits;
    }

    public function getProduitById($id) {
        $sql = 'SELECT * FROM produit WHERE id=?';

        $result = $this->pdo->prepare($sql);
        $result->bindParam(1, $id, \PDO::PARAM_INT);
        $result->execute();

        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Produit::class);
        $produit = $result->fetch();
        //var_dump($produit);

        $im = new ImageManager();
        if ($produit->getImage() != null) {
            $img = $im->getImageById($produit->getImage());
            $produit->setImage($img);
            //var_dump($produit);
        }
        //var_dump($produit);


        return $produit;
    }

}
