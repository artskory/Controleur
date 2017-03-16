<?php

namespace Modele;

use Lib\EntiteManager;
use PDO;

/**
 * Description of ArticleManager
 *
 * @author Human Booster
 */
class ArticleManager extends EntiteManager {

    public function get3ArticlesRecent() {
        $sql = ('SELECT * From article ORDER BY date DESC LIMIT 3');
        $result = $this->pdo->query($sql);

        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        $articles = $result->fetchAll();

        foreach ($articles as $article) {
            $article->setDate($article->getDate());
        }
        return $articles;
    }

    public function getArticleById($id) {
        $sql = ('SELECT * FROM article WHERE id= :id');
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        $article = $result->fetch();
        $article->setDate($article->getDate());
        return $article;
    }

    public function getAllArticle($offset, $limit) {
        $sql = ('SELECT * From article LIMIT=' . $limit . 'OFFSET=? ORDER BY date DESC ');
        $result = $this->pdo->query($sql);

        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        $articles = $result->fetchAll();


        return $articles;
    }

}
