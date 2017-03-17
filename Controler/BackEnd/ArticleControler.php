<?php

namespace Controler\BackEnd;

use Lib\Controleur;
use Modele\Article;
use Modele\ArticleManager;

class ArticleControler extends Controleur {

    protected function indexAction() {
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

    protected function createAction() {
        //echo 'je le create';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $article = new Article($_POST);

            if ($article->getErreur()) {
                $this->setFlash(implode('<br>', $article->getErreur()));
            } else {
                $article->setSlug(Article::slugify($article->getTitre()));

                $article->setAuteur($this->app->getUser());

                $am = new ArticleManager();
                if ($am->insertArticle($article)) {
                    $this->setFlash('Article enregister');
                } else {
                    $this->setFlash('Erreur d\'enregistrement en BDD');
                }
                //var_dump($article);
            }
        }
        $this->render('article/create.html.php');
    }

}
