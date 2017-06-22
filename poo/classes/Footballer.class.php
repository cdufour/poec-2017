<?php
// héritage
include 'Player.class.php';

class Footballer extends Player
{
    private $salaire = 1800; // propriété définie au niveau de la classe fille
    // cette propriété s'ajoute à celles provenant de la classe mère

    public function getSalaire()
    {
        return $this->salaire;
    }

    public function setSalaire($value)
    {
        $this->salaire = $value;
    }
}



?>