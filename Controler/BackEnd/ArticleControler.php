<?php

namespace Controler\BackEnd;

use Lib\Controleur;
use Modele\ArticleManager;

class ArticleControler extends Controleur {

    public function indexAction() {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $limit = 2;
        $offset = ($page - 1) * $limit;

        $am = new ArticleManager();
        $articles = $am->getAllArticle($offset, $limit);
        $count = $am->countArticle();
        $nbPages = ceil($count / $limit);
        $this->render('article/index.html.php', ['articles' => $articles, 'nbPages' => $nbPages, 'page' => $page]);
    }

}