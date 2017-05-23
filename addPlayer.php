<?php
include 'includes/util.inc.php';
include 'includes/header.php';
include 'includes/menu.php';

if (isset($_POST['input'])) {
    //echo 'La client a validé le formulaire';

    // 1) connexion
    $db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');

    // 2) requête
    $query = $db->prepare(
        'INSERT INTO joueur (nom, prenom, age, numero_maillot) VALUES (:nom, :prenom, :age, :numero_maillot)');

    // 3) execution
    $query->execute(array(
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':age' => $_POST['age'],
        ':numero_maillot' => $_POST['numero_maillot']
    ));

} else {
    //echo 'La client n\'a pas validé le formulaire';
}

?>

<h1>Enregistrer un joueur</h1>

<form method="POST">
    <label>Nom</label>
    <input type="text" name="nom">

    <label>Prénom</label>
    <input type="text" name="prenom">

    <label>Age</label>
    <input type="text" name="age">

    <label>Numéro de maillot</label>
    <!--<input type="text" name="numero_maillot">-->
    <select name="numero_maillot">
        <?php 
            for ($i=1; $i<1000; $i++) {
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
    </select>

    <input type="submit" name="input" value="Enregistrer">
</form>

<?php include 'includes/footer.php'; ?>