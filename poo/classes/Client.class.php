<?php

class Client
{
    // propriétés
    public $nom; // accessible sans getter depuis l'extérieur de la classe
    public $prenom; // idem
    private $nb_cb; // accessible à l'intérieur de la classe par l'ensemble des méthodes MAIS inacessible depuis l'extérieur. On recourt alors à la méthode d'accès (getter): getNbCb()

    // méthodes
    // constructeur
    function __construct($nom, $prenom, $nb_cb)
    {
        // le nom des arguments fournis en entrée est arbitraire, ils ne doivent pas forcément être
        // identiques aux noms des propriétés

        // hydratation : on fournit des valeurs aux propriétés
        $this->nom = $nom;
        $this->prenom = $prenom;
        //$this->nb_cb = $nb_cb; // modification directe sans contrôle
        $this->setNbCb($nb_cb); // modification via une méthode setter
    }

    public function isCbValid() 
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

    // méthode à usage interne, non accessible depuis l'extérieur de la classe
    private function isCbOk($nb_cb)
    {
        // on retire les espaces éventuels
        $cb_no_spaces = str_replace(' ', '', $nb_cb);

        // on vérifie que le numéro de cb contient 16 caractères
        if (strlen($cb_no_spaces) == 16) {
            return true;
        } else {
            return false;
        }
    }

    // Accesseur (Getter)
    // accèder à une propriété via une méthode (accesseur)
    // permet d'effectuer un contrôle avant de renvoyer la valeur
    // exemple: on renvoie le numéro de CB uniquement si l'utiliseur
    // du site est loggué en tant qu'administateur
    public function getNbCb()
    {
        return $this->nb_cb;
    }

    // Mutateur (Setter)
    // modifier une propriété via une méthode (mutateur)
    // permet d'effectuer un contrôle avant de modifier la valeur
    // exemple: on modifie le numéro de CB uniquement si l'utiliseur
    // du site est loggué en tant qu'administateur
    public function setNbCb($value)
    {
        if ($this->isCbOk($value)) {
           $this->nb_cb = $value; 
        }
    }

}

?>