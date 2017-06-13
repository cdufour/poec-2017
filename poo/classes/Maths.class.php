<?php

class Maths 
{
    public $nb1;
    public $nb2;

    function __construct($v1, $v2)
    {
        $this->nb1 = $v1;
        $this->nb2 = $v2;
    }

    function add()
    {
        return $this->nb1 + $this->nb2;
    }

    function multiply()
    {
        return $this->nb1 * $this->nb2;
    }

    function substract($v1, $v2)
    {
        //return $this->nb1 - $this->nb2;

        // retourne le résultat de la soustraction
        // entre deux valeurs fournies lors de l'appel
        // de la méthode
        // A la différence deux méthodes add et multiply
        // nous n'opérons pas ici sur les propriétés internes de la classe (objets issues de cette classe)
        return $v1 - $v2;
    }
}



?>