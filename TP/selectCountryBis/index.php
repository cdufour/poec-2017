<?php
include '../../includes/connexion_db.php';

$db = connect(); // connection à la db
$query = $db->prepare('SELECT * FROM pays ORDER BY nom ASC'); // requête SQL
$query->execute();
$pays = $query->fetchAll(); // crée et renvoie tableau associatif des données

?>

<!DOCTYPE html>
<html>
<head>
    <title>TP SelectCountry</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>TP: sélection d'un pays</h1>
    <select>
        <option value="0">Choisir un pays</option>
        <?php
            foreach($pays as $p) {
                echo '<option value="'.$p['id'].'">'.$p['nom'].'</option>';
            }
        ?>
    </select>

    <?php foreach($pays as $p): ?>

    <div id="pays_<?php echo $p['id'] ?>" class="container pays_infos">
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>Capitale</strong>
                    <span><?php echo $p['capitale'] ?></span>
                </p>
                <p>
                    <strong>Nombre d'habitants</strong>
                    <span><?php echo $p['nb_habitants'] ?></span>
                </p>
                <p>
                    <strong>Superficie</strong>
                    <span><?php echo $p['superficie'] ?></span>
                </p>
                <p>
                    <strong>Langues officielles</strong>
                    <span><?php echo $p['langues'] ?></span>
                </p>
            </div>
            <div class="col-md-6">
                <img class="flag" src="<?php echo $p['drapeau'] ?>">
            </div>
        </div>
    </div>

    <?php endforeach ?>

    <script src="../../js/zepto.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>