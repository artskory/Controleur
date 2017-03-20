<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools;

use finfo;

/**
 * @param string $dir
 * @param array $file
 * @return array
 */
Trait upLoadImage {

    public function upload($dir, $file) { // Ici nous avons plus qu'un tableau
        //var_dump($file);
        if (!is_dir($dir)) {
            return ['upload' => FALSE, 'message' => 'Le dossier de destination est different'];
        }
        if ($file['error'] > 0) {
            switch ($file['error']) {
                case UPLOAD_ERR_INI_SIZE :
                    $message = "Erreur : " . UPLOAD_ERR_INI_SIZE . " Le fichier téléchargé exède la taille de upload_max_filesize, configurée dans le php.ini";
                    break;
                case UPLOAD_ERR_FORM_SIZE :
                    $message = "Erreur : " . UPLOAD_ERR_FORM_SIZE . " Le fichier téléchargé exède la taille de max_file_size, qui a été spécifier dans le formulaire ";
                    break;
                case UPLOAD_ERR_PARTIAL :
                    $message = "Erreur : " . UPLOAD_ERR_PARTIAL . " Le fichier n'a été que partiellement téléchargé ";
                    break;
                case UPLOAD_ERR_NO_FILE :
                    $message = "Erreur : " . UPLOAD_ERR_NO_FILE . " Aucun fichier n'a été télécharger ";
                    break;
                default:
                    $message = "Erreur upload";
            }
            return ['upload' => FALSE, 'message' => $message]; // Pas besoin de else par la suite du fait que l'on ait un return
        }

        $extention = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)); // on recupere l'extention du fichier
        //var_dump($extention);

        $typeMime = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']; // on met dans un tableau les type mime que l'on autorise
        $finfo = new \finfo(FILEINFO_MIME_TYPE);

        $type = $finfo->file($file['tmp_name']);
        //var_dump($type);

        if (!in_array($type, $typeMime)) { // on verifi que l'extention corespond a ce que l'on c'est autorisé
            return ['upload' => FALSE, 'message' => 'Choisir une image'];
        }
        $fileName = sha1(uniqid(rand(), TRUE)) . '.' . $extention; // on applique au nom du fichier un sha1 avec un id unique, on melange la chaine de charactère que l'on concatene avec son extention
        $destination = $dir . '/' . $fileName;

        if (move_uploaded_file($file['tmp_name'], $destination)) { // Enregistrement du fichier temporaire vers le dossier de destination
            return ['upload' => TRUE, 'message' => $fileName];
        } else {
            return ['upload' => FALSE, 'message' => "Erreur pendant l'enregistrement du fichier"];
        }
    }

    public function miniature($source, $destination, $widht = 150, $height = 150) {
        $ext = strtolower(pathinfo($source, PATHINFO_EXTENSION));
        $file = pathinfo($source, PATHINFO_FILENAME);
        switch ($ext) {
            case 'jpeg':
            case 'jpg':
                $src_image = imagecreatefromjpeg($source);
                break;
            case 'gif':
                $src_image = imagecreatefromgif($source);
                break;
            case 'png':
                $src_image = imagecreatefrompng($source);
                break;
        }

        // on attribut une couleur de fond (rouge) pour les contours de la miniature
        $dst_image = imagecreatetruecolor($widht, $height);
        $r = 255;
        $v = 255;
        $b = 255;
        $couleur_fond = imagecolorallocate($dst_image, $r, $v, $b);
        imagecolortransparent($dst_image, $couleur_fond);
        imagefill($dst_image, 0, 0, $couleur_fond);


        $dims = getimagesize($source);
        list($src_w, $src_h) = getimagesize($source);

        $ratio_orig = $src_w / $src_h;

        $dst_w = $widht;
        $dst_h = $height;

        if ($dst_w / $dst_h > $ratio_orig) {
            $dst_w = $dst_h * $ratio_orig;
        } else {
            $dst_h = $dst_w / $ratio_orig;
        }

        $dst_x = ($widht - $dst_w) / 2;
        $dst_y = ($height - $dst_h) / 2;

        imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);

        if (imagepng($dst_image, $destination . '/' . $file . '.png')) {
            return $file . '.png';
        } else {
            return NULL;
        }
    }

}
