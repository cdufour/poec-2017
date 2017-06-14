<?php
include 'classes/PlayerManager.class.php';
include_once 'classes/Player.class.php';

// point d'entrée (entry point) des requêtes ajax envoyées
// par le client

if (empty($_POST)) { // requête en GET

   switch ($_GET['action']) {
    case 'list':
        $pm = new PlayerManager();
        echo json_encode($pm->getListFromAjax());
        break;

    case 'delete':
        $pm = new PlayerManager();
        if($pm->getById($_GET['id'])->delete()) {
            echo 'Joueur supprimé';
        } else {
            echo 'La tentative de suppression a échoué';
        }
        break;

    default:
        echo "Action non reconnue";
        break;
    } 
    
} else {
    echo 'requête POST';
}


?>