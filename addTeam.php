<?php
include 'includes/util.inc.php';
include 'includes/equipe.inc.php';
include 'includes/header.php';
include 'includes/menu.php';

//var_dump($_SESSION);

// Note concernant l'upload
// Pour prendre en compte des fichiers > 2M
// Modifier le fichier php.ini : C:\wamp64\bin\php\<php_version>
// upload_max_filesize = 2M

if (isset($_POST['input']) && isset($_FILES)) {

    $extension = substr($_FILES['logo']['name'], -4);
    $conditions = 
        $_FILES['logo']['size'] < 500000 &&
        isFormatAllowed($extension);

    // upload du fichier
    if ($conditions) {
        $src = $_FILES['logo']['tmp_name'];
        //$dest = 'img/logo/' . $_FILES['logo']['name'];
        $dest = 'img/logo/' . rightFormat($_POST['nom']) . $extension;

        // déplacer le fichier de la zone temporaire vers son 
        // emplacement "définitif" sur le serveur
        move_uploaded_file($src, $dest);

        $team = $_POST; // copie $_POST dans $team;

        // on ajoute la clé 'logo' au tableau associatif $team
        $team['logo'] = $dest; 

        if (createTeam($team)) {
            header('location:equipes.php');
        } else {
            echo '<p class="text-warning">L\'enregistrement a échoué</p>';
        }

    } else {
        echo '<p>Format non autorisé ou fichier trop lourd</p>';
    }
}
?>

<?php 

//if (isset($_SESSION['logged'])) {
if (isset($_SESSION['user'])) {
    
    if ($_SESSION['user']['role'] == 'admin') {
        include 'includes/forms/addTeam.inc.php';
    } else {
        echop('Droits insuffisants');
    }
    
} else {
    echop('Vous devez être connecté pour accéder à cette ressource');
}

?>


<?php include 'includes/footer.php'; ?>