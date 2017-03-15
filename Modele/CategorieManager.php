<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modele;

use Lib\EntiteManager;
use PDO;

/**
 * Description of CategorieManager
 *
 * @author Human Booster
 */
class CategorieManager extends EntiteManager {

    public function getAllCategorie() {
        $sql = ('SELECT * From categorie ORDER BY id');
        $result = $this->pdo->query($sql);

        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
        $categories = $result->fetchAll();


        return $categories;
    }

    public function getProduitById($id) {
        $sql = ('SELECT * FROM produit WHERE categorie=?');
        $result = $this->pdo->prepare($sql);
        $result->bindParam(1, $id, PDO::PARAM_INT);

        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Produits::class);
        $produits = $result->fetchAll();
        return $produits;
    }

}
