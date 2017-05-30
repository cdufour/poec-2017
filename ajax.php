<?php
$players = ['Chiellini', 'Benatia', 'Rincon'];

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


//print_r($players); // retourne la chaîne (pas un tableau !) : 
//Array ( [0] => Chiellini [1] => Benatia [2] => Rincon )

echo json_encode($players); // envoie au client les données (le tableau) au format JSON (format d'échange de données)

?>