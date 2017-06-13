<?php

class Player
{
    public $db;

    public $nom;
    public $prenom;
    public $age;
    public $numero_maillot;
    public $equipe;

    function __construct($data)
    {
        // 1) connexion à la base de données
        $this->db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');

        $this->nom              = $data['nom'];
        $this->prenom           = $data['prenom'];
        $this->age              = $data['age'];
        $this->numero_maillot   = $data['numero_maillot'];
        $this->equipe           = $data['equipe'];
    }

    function save()
    {
        // 2) requête
        $query = $this->db->prepare(
        'INSERT INTO joueur (nom, prenom, age, numero_maillot, equipe) VALUES (:nom, :prenom, :age, :numero_maillot, :equipe)');

        // 3) execution
        return $query->execute(array(
            ':nom'              => $this->nom,
            ':prenom'           => $this->prenom,
            ':age'              => $this->age,
            ':numero_maillot'   => $this->numero_maillot,
            ':equipe'           => $this->equipe
        ));
    }
}



?>