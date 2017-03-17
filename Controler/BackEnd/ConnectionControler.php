<?php

namespace Controler\BackEnd;

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
                    setcookie(session_name(), session_id(), time() + 3600, '/', null, null, true);
                } else {
                    sleep(1);
                    $this->setFlash('Login ou mot de passe incorrecte');
                }
            } else {
                sleep(1);
                $this->setFlash('Login ou mot de passe incorrecte');
            }
        } else {
            $this->setFlash('csrf');
        }

        header('Location: ' . \Lib\Application::RACINE . 'admin');
        exit();
    }

    public function logoutAction() {
        session_destroy();
        setcookie(session_name(), session_id(), time() - 1, '/', null, null, true);

        header('Location: ' . \Lib\Application::RACINE . 'admin');
        exit();
    }

}
