<?php

namespace Modele;

/**
 * Description of UserManager
 *
 * @author Human Booster
 */
class UserManager extends \Lib\EntiteManager {

    public function getUserByLogin($login) {
        $sql = 'SELECT * FROM user where login=?';
        $result = $this->pdo->prepare($sql);
        $result->bindValue(1, $login);
        $result->execute();
        $result->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, user::class);
        return $result->fetch();
    }

}
