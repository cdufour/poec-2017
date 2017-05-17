<?php

echo "Bonjour";
echo "<p>Au revoir</p>";
echo "<ul><li>Pomme</li>";
echo "<li>Mangue</li></ul>";

$nb1 = 10;
// Structures conditionnelles
// if
if ($nb1 > 10) {

    if ($nb1 > 10000) {
        echo "<div>IMMENSE</div>";
    } else {
        echo "Il n'est pas vrai que " . $nb1 . " est supérieur à 10";
    }

} elseif ($nb1 == 10) {
    echo "Il n'est pas vrai que " . $nb1 . " est égal à 10";
} else {
    echo "Il n'est pas vrai que " . $nb1 . " est supérieur à 10";
}

$connected = false;

if ($connected) echo "Vous êtes connecté"; // $connected === true
if (!$connected) echo "Vous n'êtes pas connecté"; // $connected === false

if (!$nb1 == 10) {
    // si $nb n'est pas égal (donc différent) à 10
    // autre syntaxe possible: $nb != 10
}


?>
