<?php

namespace Modele;

/**
 * Description of user
 *
 * @author Human Booster
 */
class user extends \Lib\Entite {

    protected $login, $pwd, $privilege, $email;

    public function getLogin() {
        return $this->login;
    }

    public function getPwd() {
        return $this->pwd;
    }

    public function getPrivilege() {
        return $this->privilege;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setLogin($login) {
        $this->login = $login;
        return $this;
    }

    public function setPwd($pwd) {
        $this->pwd = $pwd;
        return $this;
    }

    public function setPrivilege($privilege) {
        $this->privilege = $privilege;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

}
