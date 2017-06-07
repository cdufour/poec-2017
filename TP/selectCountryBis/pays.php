<?php
include '../../includes/connexion_db.php';

$id = $_GET['id']; // récupération de l'id fourni en paramètre d'url
$db = connect();

$db->exec("set names utf8"); // résoud le problème de l'encodage en utf8 (prélude nécessaire à l'encodage JSON)
// https://openclassrooms.com/forum/sujet/encodage-de-caracteres-lors-d-une-requete-sql

$query = $db->prepare('SELECT * FROM pays WHERE id = :id');
$query->execute(array(
    ':id' => $id
));
$pays = $query->fetch();

// réponse au client

// utf8_encode() ne résoud pas le problème
echo json_encode($pays);

?>