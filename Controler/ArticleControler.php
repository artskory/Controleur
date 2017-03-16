<?php

namespace Controler;

use Lib\Controleur;
use Modele\ArticleManager;

class ArticleControler extends Controleur {

    public function indexAction() {

        $am = new ArticleManager();
        $articles = $am->getAllArticle();

        $this->render('article/index.html.php', ['articles' => $articles]);
    }

}
