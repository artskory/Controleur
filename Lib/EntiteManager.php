<?php

namespace Lib;

/**
 * Description of EntiteManager
 *
 * @author Human Booster
 */
abstract class EntiteManager {

    /**
     *
     * @var \PDO
     */
    protected $pdo;

    public function getPdo() {
        return $this->pdo;
    }

    public function setPdo($pdo) {
        $this->pdo = $pdo;
        return $this;
    }

    public function __construct() {
        $this->pdo = PDOFactory::get();
        //var_dump($this->pdo);
    }

}
