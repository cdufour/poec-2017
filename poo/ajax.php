<?php
include 'classes/PlayerManager.class.php';
include_once 'classes/Player.class.php';

// point d'entrée (entry point) des requêtes ajax envoyées par le client

$req_method = $_SERVER['REQUEST_METHOD']; // renvoie le nom
// de la méthode HTTP utilisée par la requête du client 

if ($req_method == 'GET') { // requête en GET

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
    
} elseif ($req_method == 'POST') {
    // PHP ne récupère pas les données postées par le client dans $_POST lorsque la requête POST est effectuée en Ajax
    // file_get_contents('php://input') renvoie les données postées par le client dans une requête ajax

    // Par défaut, json_decode convertit la chaîne JSON en objet,
    // le paramètre $assoc = true permet d'obtenir à la place un tableau associatif
    $data = json_decode(file_get_contents('php://input'), $assoc = true);

    // $data['player'] au lieu de $data->player
    $player = new Player($data['player']); 
    if ($player->save()) {
        echo 'joueur enregistré';
    } else {
        echo 'L\'enregisrement a échoué';
    }

} else {
    echo 'Méthode HTTP non traitée';
}



?>