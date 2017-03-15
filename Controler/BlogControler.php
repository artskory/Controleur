<?php

namespace Controler;

/**
 * Description of BlogControler
 *
 * @author Human Booster
 */
class BlogControler extends \Lib\Controleur {

    protected function indexAction() {
        //echo 'je suis le blogControler YEAH';
        $articles = new \Modele\Article();
        //var_dump($article);
        $am = new \Modele\ArticleManager();
        $articles = $am->get3ArticlesRecent();
        //var_dump($article);
        $this->render('blog/index.html.php', ['articles' => $articles]);
    }

    protected function detailAction() {
        //echo 'je suis le deatil';
        $am = new \Modele\ArticleManager();
        $article = $am->getArticleById($_GET['id']);
        //var_dump($article);
        $this->render('blog/article.html.php', ['article' => $article]);
    }

}
