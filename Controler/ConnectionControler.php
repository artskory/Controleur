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
        if ($_POST['token'] == $_SESSION['token'] && (time() - $_SESSION['tokenTime']) < 3) {
            echo 'Vrai';
        } else {
            echo "<h1>csrf</h1>";
        }

        //header
    }

}
