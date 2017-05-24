<?php
include 'includes/util.inc.php';
include 'includes/equipe.inc.php';
include 'includes/header.php';
include 'includes/menu.php';

if (isset($_POST['input'])) {

    // upload du fichier
    if ($_FILES['logo']['size'] < 500000) {

        $extension = substr($_FILES['logo']['name'], -4);
        $src = $_FILES['logo']['tmp_name'];
        //$dest = 'img/logo/' . $_FILES['logo']['name'];
        $dest = 'img/logo/' . $_POST['nom'] . $extension;

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
        echo '<p>Fichier trop lourd</p>';
    }
}
?>

<h1>Ajouter une équipe</h1>
<!-- enctype="multipart/form-data" pour envoyer des fichiers -->
<form method="POST" enctype="multipart/form-data">
    <label>Nom</label>
    <input type="text" name="nom">

    <label>Entraineur</label>
    <input type="text" name="entraineur">

    <label>Couleurs</label>
    <input type="text" name="couleurs">

    <br>
    <label>Logo</label>
    <input type="file" name="logo">

    <input type="submit" name="input">
</form>


<?php include 'includes/footer.php'; ?>