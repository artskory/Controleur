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
        $sql = ('SELECT * FROM article ORDER BY date DESC LIMIT ' . $limit . ' OFFSET ?');
        $result = $this->pdo->prepare($sql);
        $result->bindParam(1, $offset, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        $articles = $result->fetchAll();


        return $articles;
    }

    public function countArticle() {
        $sql = ('SELECT COUNT(*) FROM article');
        $result = $this->pdo->query($sql);



        return $result->fetchColumn();
    }

}
