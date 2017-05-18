<?php
include 'includes/header.php';
include 'includes/menu.php';

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
// tableau à indice numérique (premier élément indexé à 0)
$nombres = [4, 7, 569, 12];
$joueurs = ["Bonucci", "Barzagli", "Chiellini"];
$mix = ["Buffon", 1, true];

echo $nombres[3]; // renvoie 12

echo $joueurs[0]; // renvoie Bonucci

$mix[2] = false; // écrase (écrit) la valeur précédente située à l'indice 2 du tableau

// Tableau associatif

$bonucci1 = [
    'path' => 'img/joueurs/bonucci1.jpg',
    'caption' => 'Bonucci célébrant un but',
    'alt' => 'Célébration'
];

$bonucci2 = [
    'path' => 'img/joueurs/bonucci2.jpg',
    'caption' => 'Bonucci rageur',
    'alt' => 'Rage'
];

$bonucci3 = [
    'path' => 'img/joueurs/bonucci3.jpg',
    'caption' => 'Bonucci en conférence de presse',
    'alt' => 'Conférence'
];

$joueur = [
    'nom' => 'Bonucci', 
    'prenom' => 'Leonardo',
    'age' => 29,
    'numero' => 19,
    'club' => 'Juventus',
    'international' => true,
    'photos' => ['bonucci1', 'bonucci2', 'bonucci3'],
    'photos2' => [$bonucci1, $bonucci2, $bonucci3]
];

echo '<p>' . $joueur['club'] . '</p>'; // renvoie Juventus

/*foreach ($joueur['photos'] as $photo) {
    echo '<div><img src="img/joueurs/'.$photo.'.jpg"></div>';
}*/

echo '<table class="table table-striped">';

foreach ($joueur['photos2'] as $photo) {
    echo '<tr>';
    echo '<td><img style="width:200px" src="'.$photo['path'].'"></td>';
    echo '<td>'.$photo['caption'].'</td>';
    echo '</tr>';
}

echo '</table>';

include 'includes/footer.php';
?>
