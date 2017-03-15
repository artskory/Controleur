<?php

namespace Lib;

use PDO;

/**
 * Description of PDOFactory
 *
 * @author Human Booster
 */
abstract class PDOFactory {

    protected static $pdo = null;

    const HOST = 'localhost';
    const DBNAME = 'cataloguemvc';
    const LOGIN = 'root';
    const PWD = '';

    public static function get() {
        //return 'Hello';
        if (self::$pdo == NULL) {
            self::$pdo = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME, self::LOGIN, self::PWD, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return self::$pdo;
        } else {
            return self::$pdo;
        }
    }

}
