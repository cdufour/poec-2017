<?php

class PlayerManager
{
    public $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');

    }

    function getList()
    {
        $query = $this->db->prepare('SELECT * FROM joueur');
        $query->execute();
        return $query; // renvoie le retour SQL sans fetch
    }

    function getListFilteredByAge($ageLimit)
    {
        $query = $this->db->prepare('SELECT * FROM joueur WHERE age < ' . $ageLimit);
        $query->execute();
        return $query; // renvoie le retour SQL sans fetch
    }

}

?>