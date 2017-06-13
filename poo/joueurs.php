<?php
include 'classes/PlayerManager.class.php';
include_once 'classes/Player.class.php';

$pm = new PlayerManager();
$joueurs = $pm->getListFetched();

$donnees = [
    'nom'               => 'Nedved',
    'prenom'            => 'Pavel',
    'age'               => 45,
    'numero_maillot'    => 6,
    'equipe'            => 1
];

$player = new Player($donnees);
/*if ($player->save()) {
    echo 'Joueur enregistré en base de données';
} else {
    echo 'booooooooooooohhhhhhhhhhhhh';
}*/

$player2 = $pm->getById(4);
$player2->numero_maillot = 26;

if ($player2->update()) {
    echo 'Joueur mis à jour';
} else {
    echo 'Albooooooooooooooooooooooooooooo';
}



?>