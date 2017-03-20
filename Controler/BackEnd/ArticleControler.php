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
            //var_dump($_FILES);
            $article = new Article($_POST);
            if ($article->getErreur()) {
                $this->setFlash(implode('<br>', $article->getErreur()));
            } else {
                if ($_FILES['image']['error'] != 4) {
                    $upload = $article->upload(__DIR__ . '/../../web/images', $_FILES['image']);
                    //var_dump($upload);
                }
                if ($upload['upload']) {
                    $mini = $article->miniature(__DIR__ . '/../../web/images/' . $upload['message'], __DIR__ . '/../../web/images/thumbnails');
                    $article->setImage($mini);
                } else {
                    $this->setFlash($upload['Erreru de miniature']);
                }
                $article->setSlug(Article::slugify($article->getTitre()));

                $article->setAuteur($this->app->getUser());
                //var_dump($_POST);
                $am = new ArticleManager();
                if ($id = $am->insertArticle($article)) {
                    $this->setFlash('Article enregistrer');
                    $article->setId($id);
                } else {
                    $this->setFlash('Erreur d\'enregistrement en BDD');
                }
            }
            //header('Location: ' . \Lib\Application::RACINE . 'admin?action=create');
            //exit();
        }
        $this->render('article/create.html.php');
    }

}
