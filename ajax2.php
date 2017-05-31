<?php
include 'includes/connexion_db.php';

$db = connect();
/*$query = $db->prepare('
    SELECT joueur.nom, joueur.prenom, joueur.age, joueur.equipe, joueur.numero_maillot, equipe.nom AS equipe_nom 
    FROM joueur, equipe 
    WHERE joueur.equipe = equipe.id
');*/

// nouvelle syntaxe pour la jointure
// INNER JOIN : jointure interne, restrictive. Elimine les
// les lignes qui n'ont pas de correspondance dans l'autre table

// LEFT JOIN : jointure externe, ouverte. Inclut les lignes n'ayant pas de correspondance dans l'autre table (Colonnes manquantes remplies par NULL)
$query = $db->prepare('
    SELECT joueur.nom, joueur.prenom, joueur.age, joueur.equipe, joueur.numero_maillot, equipe.nom AS equipe_nom 
    FROM joueur
    LEFT JOIN equipe
    ON joueur.equipe = equipe.id
    ORDER BY joueur.age ASC, joueur.nom ASC
');
$query->execute();
$results = $query->fetchAll();

echo json_encode($results);

?>