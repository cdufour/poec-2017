<?php
include 'includes/header.php';
include 'includes/menu.php';

// *** boucles ***
// FOR

for ($i=0; $i<3; $i++) {
    echo '<p>'.$i.'</p>';
}

// WHILE

$i = 0; // variable servant d'incrémenteur
while ($i < 3) {
    echo '<p>'.$i.'</p>';
    $i++;
}

// FOREACH
// boucle idéale pour parcourir un tableau

$mois = ["janvier", "février", "mars", "avril"];

echo "<select>";

foreach ($mois as $m) {
    // la variable $m est automatiquement assignée
    // à chaque itération, elle correspondra tour à tour, à chaque
    // valeur contenu dans la tableau $mcrypt_module_is_block_algorithm(
    echo "<option>" . $m . "</option>";
}

for ($i=0; $i<4; $i++) {
    echo "<option>" . $mois[$i] . "</option>";
}

echo "</select>";

$animaux = ["casoar", "elephant", "loup", "lion", "milan"];
$width = 300;
$i = 1;
$color = "green";
foreach ($animaux as $animal) {
    echo "<div><img style=\"width:" . $width . "px;border:2px ".$color." solid\" src=\"img/" . $animal . ".jpg\"></div>";

        echo '<div><img style="width:' . $width . 'px;border:2px '.$color.' solid" src="img/' . $animal . '.jpg"></div>';
    $i++;
}

echo '<script src="js/script.js"></script>';

// Exo
// Afficher deux autres photos d'animaux au choix
// Afficher une bordure colorée autour de toutes les images

include 'includes/footer.php';
?>