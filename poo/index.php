<?php
include 'classes/Client.class.php';
include 'classes/Equipe.class.php';

class Joueur {
    public $nom = 'Zidane';
    public $prenom = 'Enzo';
    public $age;        

    // méthode
    public function identite() {
        echo strtoupper($this->nom) . ' ' . $this->prenom;
    }
}

$j1 = new Joueur(); // new: opérateur d'instanciation
$j2 = new Joueur(); // l'instanciation produit un objet (= une instance) à partir d'une classe
$j3 = new Joueur();

$equipe = array(); // [] tableau vide

for ($i=0; $i<11; $i++) {
    $joueur = new Joueur();

    //array_push($equipe, $joueur); // En JS : equipe.push(joueur)
    $equipe[$i] = $joueur;
}

// équivalent en orienté procédural

function creeJoueur() {
    // modélisation des données par tableau associatif
    $joueur = [
        'nom' => 'Zidane',
        'prenom' => 'Enzo',
        'age' => null
    ];

    // la function creeJoueur renvoie un tableau associatif, PAS UN OBJET
    return $joueur; 
}

function identite($joueur) {
    echo strtoupper($joueur['nom']) . ' ' . $joueur['prenom'];
}

$j4 = creeJoueur(); // création d'un joueur en style procédural
$j5 = creeJoueur();

// utilisation de la classe Client
$client1 = new Client('Langlais', 'Sophie', '4913 2145 8899 6330');
echo $client1->nom;
echo $client1->prenom;
echo $client1->nb_cb;

var_dump($client1->isCbValid());

// test
/*
$cb = '4923 2145 8899 6330';
$result = str_replace(' ', '', $cb);
echo $result;

function deleteSpaces($str) {
    return str_replace(' ', '', $str);
}

echo deleteSpaces("Php est un langage dérivé du C");
*/

// utilisation de la classe Equipe
$psg = [
    'nom' => 'PSG',
    'annee_creation' => 1970,
    'entraineur' => 'Unai Emery',
    'couleurs' => 'bleu, rouge'
];

$juve = [
    'nom' => 'Juventus',
    'annee_creation' => 1897,
    'entraineur' => 'Massimiliano Allegri',
    'couleurs' => 'blanc, noir'
];

$equipe1 = new Equipe($psg);
$equipe2 = new Equipe($juve);

// deux instruction équivalentes
echo $psg['entraineur'];
echo $equipe1->entraineur;

//var_dump($psg); // => array
//var_dump($equipe1); // => object

$equipe1->joueContre('Benfica', 'Paris', '14/02/2005');
$equipe1->joueContre('Porto', 'Paris', '15/02/2005');
$equipe1->joueContre('Madrid', 'Cardiff', '03/06/2017');

var_dump($equipe1);

?>

<h1>POO en PHP</h1>

<?php

    echo '<p>'. $j1->nom .'</p>';
    echo '<p>'. $j2->prenom .'</p>';

    $j3->nom = 'Baggio'; // écriture
    $j3->prenom = 'Roberto';
    $j3->age = 39;

    echo '<p>'. $j3->nom . ' ' . $j3->prenom . ' ('. $j3->age .' ans)</p>';

    $j3->identite(); // appel à la function (méthode) identite en style objet

    echo '<p>'. $j4['nom'] .'</p>';
    echo '<p>'. $j5['prenom'] .'</p>';

    identite($j5); // appel à la function identite en style procédural

?>