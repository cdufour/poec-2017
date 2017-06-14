<?php
include 'classes/PlayerManager.class.php';
include_once 'classes/Player.class.php';

// point d'entrée (entry point) des requêtes ajax envoyées
// par le client

switch ($_GET['action']) {
    case 'list':
        $pm = new PlayerManager();
        echo json_encode($pm->getListFromAjax());
        break;
    
    default:
        echo "Action non reconnue";
        break;
}


?>