<?php
include_once 'connexion_db.php';

function getTeams() {
    $db = connect();
    $query = $db->prepare('SELECT * FROM equipe');
    $query->execute();
    return $query->fetchAll();
}

function selectFormat($teams) {
    $output = '<select name="equipe">';
    foreach ($teams as $team) {
        $output .= '<option value="'.$team['id'].'">'.$team['nom'].'</option>';
    }
    $output .= '</select>';
    return $output;
}

function selectFormatWithOpt($teams, $opt) {
    $output = '<select name="equipe">';
    foreach ($teams as $team) {
        if ($team['id'] == $opt) {
            $output .= '<option selected value="'.$team['id'].'">'.$team['nom'].'</option>';  
        } else {
            $output .= '<option value="'.$team['id'].'">'.$team['nom'].'</option>';    
        }
    }
    $output .= '</select>';
    return $output;
}

?>