<?php
include '../../includes/connexion_db.php';

$id = $_GET['id']; // récupération de l'id fourni en paramètre d'url
$db = connect();
$query = $db->prepare('SELECT * FROM pays WHERE id = :id');
$query->execute(array(
    ':id' => $id
));
$pays = $query->fetch();

// réponse au client
echo json_encode($pays);

?>