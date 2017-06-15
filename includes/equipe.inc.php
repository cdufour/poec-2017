<?php
include_once 'connexion_db.php';

function getTeams() {
    $db = connect();
    $query = $db->prepare('SELECT * FROM equipe ORDER BY nom ASC');
    $query->execute();
    return $query->fetchAll();
}

function getTeamById($id) {
    $db = connect();
    $query = $db->prepare(
        'SELECT * FROM equipe WHERE id = :id'
    );
    $query->execute(array(
        ':id' => $id
    ));
    return $query->fetch();
}

function selectFormat($teams) {
    // ng-model permet à Angular de "surveiller"
    // la valeur sélectionnée dans le menu de sélection
    $output = '<select ng-model="player.equipe" name="equipe">';
    $output .= '<option value="0">Sans équipe</option>';
    foreach ($teams as $team) {
        $output .= '<option value="'.$team['id'].'">'.$team['nom'].'</option>';
    }
    $output .= '</select>';
    return $output;
}

function selectFormatWithOpt($teams, $opt) {
    $output = '<select name="equipe">';
    $output .= '<option value="0">Sans équipe</option>';
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

function tableFormat($teams) {
    $output = '<table class="table table-striped equipe">';
    $output .= '<tr><th>Nom</th><th>Entraineur</th><th>Couleurs</th><th>Logo</th></tr>';
    foreach ($teams as $team) {
        $output .= '<tr>';
        $output .= '<td>'.$team['nom'].'</td>';
        $output .= '<td>'.$team['entraineur'].'</td>';
        $output .= '<td>'.$team['couleurs'].'</td>';
        $output .= '<td><img src="'.$team['logo'].'"></td>';
        $output .= '</tr>';
    }
    $output .= '</table>';
    return $output;
}

function createTeam($team) {
    $db = connect();
    $query = $db->prepare('
        INSERT INTO equipe (nom, entraineur, couleurs, logo)
        VALUES (:nom, :entraineur, :couleurs, :logo)
    ');
    $result = $query->execute(array(
        ':nom'          => $team['nom'],
        ':entraineur'   => $team['entraineur'],
        ':couleurs'     => $team['couleurs'],
        ':logo'         => $team['logo']
    ));
    return $result; // boolean (vrai si succès, faux si échec)
}

?>