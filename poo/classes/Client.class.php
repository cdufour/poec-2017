<?php

class Client
{
    // propriétés
    public $nom;
    public $prenom;
    public $nb_cb;

    // méthodes
    // constructeur
    function __construct($nom, $prenom, $nb_cb)
    {
        // le nom des arguments fournis en entrée est arbitraire, ils ne doivent pas forcément être
        // identiques aux noms des propriétés

        // hydratation : on fournit des valeurs aux propriétés
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->nb_cb = $nb_cb;
    }

    function isCbValid() 
    {
        // on retire les espaces éventuels
        $cb_no_spaces = str_replace(' ', '', $this->nb_cb);

        // on vérifie que le numéro de cb contient 16 caractères
        if (strlen($cb_no_spaces) == 16) {
            return true;
        } else {
            return false;
        }

    }

}

?>