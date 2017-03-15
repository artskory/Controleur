<?php

namespace Modele;

/**
 * Description of UserManager
 *
 * @author Human Booster
 */
class UserManager extends EntiteManager {

    public function getUserById() {
        $sql = 'SELECT * FROM user ';
    }

}
