<?php

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