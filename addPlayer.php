<?php
include 'includes/util.inc.php';
include 'includes/equipe.inc.php';
include 'includes/header.php';
include 'includes/menu.php';

if (isset($_POST['input'])) {
    //echo 'La client a validé le formulaire';

    // 1) connexion
    $db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');

    // 2) requête
    $query = $db->prepare(
        'INSERT INTO joueur (nom, prenom, age, numero_maillot, equipe) VALUES (:nom, :prenom, :age, :numero_maillot, :equipe)');

    // 3) execution
    $query->execute(array(
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':age' => $_POST['age'],
        ':numero_maillot' => $_POST['numero_maillot'],
        ':equipe' => $_POST['equipe']
    ));

    // redirection
    header('location:joueurs.php');

} else {
    //echo 'La client n\'a pas validé le formulaire';
}

?>

<h1>Enregistrer un joueur</h1>

<div class="container">
    <form method="POST">
    <div class="row">
        <div class="col-md-4">
            <label>Nom</label>
            <input type="text" name="nom">
        </div>
        <div class="col-md-4">
            <label>Prénom</label>
            <input type="text" name="prenom">
        </div>
        <div class="col-md-4">
            <label>Age</label>
            <input type="text" name="age">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Numéro de maillot</label>
            <!--<input type="text" name="numero_maillot">-->
            <select name="numero_maillot">
                <?php 
                    for ($i=1; $i<1000; $i++) {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                ?>
            </select> 
        </div>
        <div class="col-md-6">
            <label>Equipe</label>
            <?php echo selectFormat(getTeams()); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <input type="submit" name="input" value="Enregistrer">
        </div>
    </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>