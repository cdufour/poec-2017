<?php

function echop($str) {
    echo '<p>'.$str.'</p>';
}

function isFormatAllowed($format) {
    $isAllowed = false;

    // formats de fichier autorisés
    $formats_allowed = ['.png', '.jpg', '.gif'];

    foreach ($formats_allowed as $format_allowed) {
        if ($format_allowed == $format) {
            $isAllowed = true;
        }
    }

    return $isAllowed;
}

function rightFormat($str) {
    $newFormat = null;

    // suppression des espaces en début et fin de chaîne
    $newFormat = trim($str);

    // passage à la minuscule
    $newFormat = strtolower($newFormat);

    // remplacement de l'espace par un tiret
    $newFormat = str_replace(' ', '-', $newFormat);

    return $newFormat;
}


?>