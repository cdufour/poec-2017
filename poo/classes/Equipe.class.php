<?php

class Equipe 
{

    // propriétés
    public $nom;
    public $annee_creation;
    public $entraineur;
    public $couleurs;
    public $rencontres = [];

    // méthodes
    function __construct($data) 
    {
        // hydratation
        $this->nom              = $data['nom'];
        $this->annee_creation   = $data['annee_creation'];
        $this->entraineur       = $data['entraineur'];
        $this->couleurs         = $data['couleurs'];
    }

    function joueContre($adversaire, $lieu, $date)
    {
        // ajoute au tableau des rencontres, un tableau associatif
        // contenant les infos de la rencontre
        array_push($this->rencontres, [
            "adversaire" => $adversaire, 
            "lieu" => $lieu, 
            "date" => $date
        ]);
    }
}


?>