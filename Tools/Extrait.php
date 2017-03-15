<?php

namespace Tools;

trait Extrait {

    public function getExtrait($texte, $max = 70) {
        $texte = strip_tags($texte);
        if (strlen($texte) > $max) {
            $texte = substr($texte, 0, $max);
            $pos = strrpos($texte, " ");
            if ($pos != false) {
                $texte = substr($texte, 0, $pos);
                $texte .= " [...]";
            }
        }
        return $texte;
    }

}
