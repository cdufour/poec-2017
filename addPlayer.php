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
        'INSERT INTO joueur (nom, prenom, age) VALUES (:nom, :prenom, :age)');

    // 3) execution
    $query->execute(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'age' => $_POST['age']
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

    <input type="submit" name="input" value="Enregistrer">
</form>

<?php include 'includes/footer.php'; ?>