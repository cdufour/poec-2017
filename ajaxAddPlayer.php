<?php
include 'includes/connexion_db.php';

$db = connect();

$query = $db->prepare('
    INSERT INTO joueur (nom, prenom, age, numero_maillot, equipe)
    VALUES (:nom, :prenom, :age, :numero_maillot, :equipe)
');

$result = $query->execute(array(
    ':nom' => $_POST['nom'],
    ':prenom' => $_POST['prenom'],
    ':age' => $_POST['age'],
    ':numero_maillot' => $_POST['maillot'],
    ':equipe' => $_POST['equipe']
));

echo $result; // renvoie le résultat de la requête sql (booléen) au client

?>