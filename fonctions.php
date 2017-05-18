<?php
include 'includes/header.php';
include 'includes/menu.php';

//$allowed_tags = ['p', 'div', 'span', 'strong', 'em', 'h1', 'h2'];

/*** Fonctions ***/

// déclaration
function echop($str) {
    echo '<p>'.$str.'</p>';
}

function echot($str, $tag) {
    // function qui affiche la chaîne en entrée (argument 1)
    // comprise entre début et fin d'une balise html fournie en entrée (argument 2)

    if (isTagAllowed($tag)) {
        echo '<'.$tag.'>'.$str.'</'.$tag.'>';
    } else {
        echop('Balise <strong>'.$tag.'</strong> non reconnue ou non permise');
    }
}

function isTagAllowed($tag) {
    $allowed_tags = ['p', 'div', 'span', 'strong', 'em', 'h1', 'h2'];

    // vérifie que le tag fait parties des tags autorisés
    $found_tag = false; // par défault, on considére que le tag n'a pas été trouvé
    foreach ($allowed_tags as $allowed) {
        if ($tag == $allowed) {
            $found_tag = true; // tag trouvé dans le tableau
        }
    }
    return $found_tag; // on retoure vrai ou faux
}

// invocation (appel)


echo 'Les fonctions sont utiles';
echo 'Les fonctions sont utiles';
echo 'Les fonctions sont utiles';

echop("Les fonctions sont utiles");
echop("Les fonctions sont utiles");
echop("Les fonctions sont utiles");

echot("Les fonctions sont utiles", "div");
echot("Les fonctions sont utiles", "p");
echot("Les fonctions sont utiles", "span");
echot("Les fonctions sont utiles", "h3");

if (isTagAllowed('div')) {
    echop('Ce tag est autorisé');
}

include 'includes/footer.php';
?>