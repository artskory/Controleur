<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modele;

use PDO;

/**
 * Description of NotesManger
 *
 * @author Human Booster
 */
class NotesManager extends \Lib\EntiteManager {

    public function getNotesByProduitId($id) {
        $sql = ('SELECT * From notes where produit=? ORDER BY date');
        $result = $this->pdo->prepare($sql);
        $result->bindValue(1, $id);
        $result->execute();

        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Notes::class);
        $notes = $result->fetchAll();
        foreach ($notes as $note) {
            $note->setDate($note->getDate());
        }
        //var_dump($notes);
        return $notes;
    }

    public function insertNote($note) {
        $sql = 'INSERT INTO notes VALUES (null, ?, NOW(), ?, ?)';
        $result = $this->pdo->prepare($sql);
        $result->bindValue(1, $note->getPseudo(), PDO::PARAM_STR);
        $result->bindValue(2, $note->getValeur(), PDO::PARAM_INT);
        $result->bindValue(3, $note->getProduit(), PDO::PARAM_INT);
        $result->execute();
    }

}
