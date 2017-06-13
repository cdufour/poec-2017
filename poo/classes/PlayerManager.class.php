<?php
include_once 'Player.class.php';

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


    function getListFetched()
    {
        $query = $this->db->prepare('SELECT * FROM joueur');
        $query->execute();
        return $query->fetchAll(); // renvoie un tableau associatif
    }

    function getById($id)
    {
        $query = $this->db->prepare('
            SELECT * FROM joueur WHERE id = :id');
        $query->execute(array(
            ':id' => $id
        ));

        //return $query->fetch(); // renvoie un tableau associatif

        $player = new Player($query->fetch());
        return $player;
    }

}

?>