<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controler;

/**
 * Description of ArticleControleur
 *
 * @author Human Booster
 */
class ArticleControler extends \Lib\Controleur {

    public function indexAction() {
        //echo 'je suis article controler';

        $this->render('article/index.html.php');
    }

}
