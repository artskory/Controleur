<?php

namespace Modele;

use Lib\EntiteManager;
use Modele\Image;
use PDO;

class ImageManager extends EntiteManager {

    public function getImageById($id) {
        $requete = 'select * from image where id=?';
        $resultat = $this->pdo->prepare($requete);       //PAS DE QUERY, PREPARE A LA PLACE. SE CONCLUERA PAR UN EXEC
        $resultat->bindParam(1, $id, PDO::PARAM_INT);     //AUTANT DE BIND PARAM, MARQUEUR QUE NECESSAIRE
        $resultat->execute();
        $resultat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Image::class);
        $img = $resultat->fetch();
        return $img;
    }

}
