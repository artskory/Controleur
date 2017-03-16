<?php

namespace Controler;

/**
 * Description of ConnectionControleur
 *
 * @author Human Booster
 */
class ConnectionControler extends \Lib\Controleur {

    public function indexAction() {
        $token = sha1(uniqid(rand(), TRUE));
        $tokenTime = time();
        $_SESSION['token'] = $token;
        $_SESSION['tokenTime'] = $tokenTime;
        $this->render('connection.html.php', ['token' => $token]);
    }

    public function loginAction() {
        //echo 'Je suis connection';
        if ($_POST['token'] == $_SESSION['token'] && (time() - $_SESSION['tokenTime']) < 600) {
            $um = new \Modele\UserManager();
            $user = $um->getUserByLogin($_POST['login']);
            if ($user) {
                //var_dump($user);
                if (password_verify($_POST['pwd'], $user->getPwd())) {
                    //echo 'ok';
                    $_SESSION['IPaddress'] = sha1($_SERVER['REMOTE_ADDR']);
                    $_SESSION['userAgent'] = sha1($_SERVER['HTTP_USER_AGENT']);
                    $user->setAuth(true);
                    $_SESSION['user'] = $user;
                } else {
                    $this->setFlash('erreur codes');
                }
            } else {
                $this->setFlash('erreur codes');
            }
        } else {
            $this->setFlash('csrf');
        }

        //header
    }

}
