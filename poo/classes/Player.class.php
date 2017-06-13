<?php

class Player
{
    public $db;

    public $id; // nécessaire pour les opérations de mise à jour et de suppression
    public $nom;
    public $prenom;
    public $age;
    public $numero_maillot;
    public $equipe;

    function __construct($data)
    {
        // 1) connexion à la base de données
        $this->db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');

        // si l'identifiant du joueur fait partie du tableau de données passé en entrée du constructeur, on l'utilise pour hydrateur la propriété id de l'objet
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }

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

    function update()
    {
        $query = $this->db->prepare('
            UPDATE joueur 
            SET prenom = :prenom, nom = :nom, age = :age, numero_maillot = :numero_maillot, equipe = :equipe 
            WHERE id = :id
        ');

        return $query->execute(array(
            ':prenom' =>            $this->prenom,
            ':nom' =>               $this->nom,
            ':age' =>               $this->age,
            ':numero_maillot' =>    $this->numero_maillot,
            ':equipe' =>            $this->equipe,
            ':id' =>                $this->id
        ));
    }
}



?>