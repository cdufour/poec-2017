<?php
include_once 'includes/connexion_db.php'; // fournit connect();
include 'includes/util.inc.php';
include 'includes/equipe.inc.php';
include 'includes/header.php';
include 'includes/menu.php';

// récupération de l'id du joueur
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 1) connexion
    $db = connect();

    // 2) requête
    $query = $db->prepare('SELECT * FROM joueur WHERE id = :id');

    // 3) exécution
    $query->execute(array(
        ':id' => $id
    ));

    // 4) fetch
    $joueur = $query->fetch(); // un seul résultat attendu, donc 1 seul fetch (pas de boucle while)

}

// mise à jour de la table joueur
if (isset($_POST['input'])) {
    // le bouton "Mettre à jour" a été cliqué

    // si la connection n'existe pas, on DOIT l'initialiser avant l'étape de requête
    if (!isset($db)) $db = connect();

    $query = $db->prepare('
        UPDATE joueur 
        SET prenom = :prenom, nom = :nom, age = :age, numero_maillot = :numero_maillot, equipe = :equipe 
        WHERE id = :id
    ');

    $query->execute(array(
        ':prenom' =>            $_POST['prenom'],
        ':nom' =>               $_POST['nom'],
        ':age' =>               $_POST['age'],
        ':numero_maillot' =>    $_POST['numero_maillot'],
        ':equipe' =>            $_POST['equipe'],
        ':id' =>                $_POST['id']
    ));

    // redirection vers la liste des joueurs
    header('location:joueurs.php');
}


?>

<form method="POST">
    <label>Nom</label>
    <input 
        type="text" 
        name="nom" 
        value="<?php echo $joueur['nom'] ?>">

    <label>Prénom</label>
    <input 
        type="text" 
        name="prenom" 
        value="<?php echo $joueur['prenom'] ?>">

    <label>Age</label>
    <input 
        type="text" 
        name="age"
        value="<?php echo $joueur['age'] ?>">

    <label>Numéro de maillot</label>
    <!--<input type="text" name="numero_maillot">-->
    <select name="numero_maillot">
        <?php 
            for ($i=1; $i<1000; $i++) {
                if ($i == $joueur['numero_maillot']) {
                    echo '<option selected value="'.$i.'">'.$i.'</option>';
                } else {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            }
        ?>
    </select>

    <br>
    <label>Equipe</label>
    <?php echo selectFormatWithOpt(getTeams(), $joueur['equipe']); ?>

    <input type="hidden" name="id" value="<?php echo $id ?>" />

    <input type="submit" name="input" value="Mettre à jour">
</form>

<?php include 'includes/footer.php'; ?>
             