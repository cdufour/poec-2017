<?php

// Variables
// En php, on ne déclare le type (entier, chaîne, etc.) de variable

//*** Types simples ***
$message = "Le PHP c'est formidable"; // string
echo $message;

$nb1 = -5.0; // number
$nb2 = 2.21; // number
$resultat = $nb1 * $nb2;

$actif = true; // boolean

$utilisateur = null; // null, idéal comme valeur temporaire;

// Concaténation
echo '<p>Résultat: '.$resultat.'</p>';
echo '<p>' . $nb1 . ' * ' . $nb2 . ' = <strong>' . $resultat . '</strong></p>';


//*** Types complexes ***/
// tableau
$nombres = [4, 7, 569, 12];
$joueurs = ["Bonucci", "Barzagli", "Chiellini"];
$mix = ["Buffon", 1, true];

echo $nombres[3]; // renvoie 12

echo $joueurs[0]; // renvoie Bonucci

$mix[2] = false; // écrase (écrit) la valeur précédente située à l'indice 2 du tableau


?>
