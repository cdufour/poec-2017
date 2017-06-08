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
    SELECT joueur.id, joueur.nom, joueur.prenom, joueur.age, joueur.equipe, joueur.numero_maillot, equipe.nom AS equipe_nom 
    FROM joueur
    LEFT JOIN equipe
    ON joueur.equipe = equipe.id
    ORDER BY joueur.nom ASC, joueur.age ASC
');
$query->execute();
$results = $query->fetchAll();

// Modification des données (majuscule, minuscule, etc) avant l'envoi
// au client
for ($i=0; $i<sizeof($results); $i++) {
    // $results[$i]['nom'] = ucfirst($results[$i]['nom']); // initiale en majuscule
    $results[$i]['nom'] = strtoupper($results[$i]['nom']);
}

echo json_encode($results);

?>