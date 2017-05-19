<?php
include 'includes/util.inc.php';
include 'includes/header.php';
include 'includes/menu.php';

if (isset($_GET['ageLimit'])) {
    $ageLimit = $_GET['ageLimit'];

    // si l'utilisateur donne une valeur contenant plus de 2
    // caractères, on force $ageLimit à recevoir la valeur 35
    // par mesure de sécurité
    if (strlen($ageLimit) > 2) {
        $ageLimit = 35;
    }
}


// bibliothèque utilisée pour dialoguer à MySQL : PDO
// connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');

if (isset($ageLimit)) {
    $query = $db->prepare('SELECT * FROM joueur WHERE age < ' . $ageLimit);
} else {
     $query = $db->prepare('SELECT * FROM joueur');
}

// exécution de la requête
$query->execute(); // execute() renvoie vrai si réussite


//$joueurs = $query->fetchAll();

// var_dump($data);
// la function var_dump affiche la description détaillée (type et valeur)
// de la variable fournie en entrée

?>

<h1>Joueurs</h1>


<div>
    <form>
        <label>Limite d'âge</label>
        <select name="ageLimit">
            <option value="20">20 ans</option>
            <option value="25">25 ans</option>
            <option value="30">30 ans</option>
            <option value="35">35 ans</option> 
        </select>
        <input type="submit" value="Valider">
    </form>
</div>

<?php
   //foreach ($joueurs as $joueur) {
    //echo '<p>' . $joueur['prenom'] . ' ' . $joueur['nom'] . '</p>';
   //}

   // la méthode .fetch() renvoie sous forme d'un tableau php
   // la prochaine ligne (row) sql non traitée
   // les lignes sql déjà traitées (fetched) sont retirées de l'objet $query
   // fetch() renvoie false quand toutes les lignes sql ont été traitées
   while ($joueur = $query->fetch()) {
    // à chaque itération la variable $joueur reçoit le résultat de fetch()
    // c'est-à-dire un tableau associatif contenant les données du joueur
    echo '<p>' . $joueur['prenom'] . ' ' . $joueur['nom'] . '</p>';
   }
?>


<?php include 'includes/footer.php'; ?>